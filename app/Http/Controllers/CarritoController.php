<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

use App\Models\Carrito;
use App\Models\Taller;
use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\MetodoPago;
use App\Models\Inscripcion;

use App\Mail\CompraConfirmacion;

class CarritoController extends Controller
{
    // =========================
    // AGREGAR AL CARRITO (TALLERES)
    // =========================
    public function agregar(Request $request, $id)
    {
        $taller = Taller::findOrFail($id);
        $userId = Auth::id();

        if ($taller->cupos_disponibles <= 0) {
            return back()->with('error', 'No hay cupos disponibles');
        }

        $carrito = Carrito::where('user_id', $userId)
            ->where('taller_id', $id)
            ->first();

        if ($carrito) {

            if ($carrito->cantidad + 1 > $taller->cupos_disponibles) {
                return back()->with('error', 'No hay cupos suficientes');
            }

            $carrito->increment('cantidad');

        } else {

            Carrito::create([
                'user_id' => $userId,
                'taller_id' => $id,
                'cantidad' => 1,
                'expires_at' => now()->addMinutes(15),
            ]);
        }

        $taller->decrement('cupos_disponibles');

        return back()->with('success', 'Taller agregado al carrito');
    }

    // =========================
    // VER CARRITO
    // =========================
    public function verCarrito()
    {
        $carrito = Carrito::where('user_id', Auth::id())
            ->with('taller')
            ->get();

        $subtotal = $carrito->sum(
            fn($item) => $item->cantidad * $item->taller->precio
        );

        $comision = 2000;
        $total = $subtotal + $comision;

        $metodosPago = MetodoPago::where('activo', 1)->get();

        return view('backend.carrito', compact(
            'carrito',
            'subtotal',
            'comision',
            'total',
            'metodosPago'
        ));
    }

    // =========================
    // ACTUALIZAR CANTIDAD
    // =========================
    public function actualizarCantidad(Request $request, $id)
    {
        $item = Carrito::where('id', $id)
            ->where('user_id', Auth::id())
            ->with('taller')
            ->firstOrFail();

        $request->validate([
            'cantidad' => 'required|integer|min:1'
        ]);

        $taller = $item->taller;

        $nuevaCantidad = $request->cantidad;
        $diferencia = $nuevaCantidad - $item->cantidad;

        if ($nuevaCantidad > $taller->cupos_disponibles + $item->cantidad) {
            return back()->with('error', 'No hay cupos suficientes');
        }

        $taller->decrement('cupos_disponibles', $diferencia);

        $item->update([
            'cantidad' => $nuevaCantidad
        ]);

        return back()->with('success', 'Cantidad actualizada');
    }

    // =========================
    // ELIMINAR ITEM
    // =========================
    public function eliminar($id)
    {
        $item = Carrito::where('id', $id)
            ->where('user_id', Auth::id())
            ->with('taller')
            ->first();

        if ($item) {

            $item->taller->increment('cupos_disponibles', $item->cantidad);

            $item->delete();
        }

        return back()->with('success', 'Taller eliminado del carrito');
    }

    // =========================
    // VACIAR CARRITO
    // =========================
    public function vaciar()
    {
        $carrito = Carrito::where('user_id', Auth::id())
            ->with('taller')
            ->get();

        foreach ($carrito as $item) {
            $item->taller->increment('cupos_disponibles', $item->cantidad);
        }

        Carrito::where('user_id', Auth::id())->delete();

        return back()->with('success', 'Carrito vaciado');
    }

    // =========================
    // FINALIZAR COMPRA
    // =========================
    public function finalizarCompra(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'metodo_pago_id' => 'required|exists:metodo_pagos,id'
        ]);

        return DB::transaction(function () use ($user, $request) {

            $carrito = Carrito::where('user_id', $user->id)
                ->with('taller')
                ->lockForUpdate()
                ->get();

            if ($carrito->isEmpty()) {
                return back()->with('error', 'El carrito está vacío');
            }

            foreach ($carrito as $item) {
                if ($item->cantidad > $item->taller->cupos_disponibles) {
                    return back()->with(
                        'error',
                        'Cupos insuficientes para: ' . $item->taller->nombre
                    );
                }
            }

            $subtotal = $carrito->sum(
                fn($item) => $item->cantidad * $item->taller->precio
            );

            $total = $subtotal + 2000;

            $compra = Compra::create([
                'user_id' => $user->id,
                'total' => $total,
                'estado' => 'en_proceso',
                'metodo_pago_id' => $request->metodo_pago_id,
            ]);

            foreach ($carrito as $item) {

                DetalleCompra::create([
                    'compra_id' => $compra->id,
                    'taller_id' => $item->taller_id,
                    'cantidad' => $item->cantidad,
                    'precio_unitario' => $item->taller->precio,
                    'subtotal' => $item->cantidad * $item->taller->precio,
                ]);

                // CREAR INSCRIPCIÓN REAL
                Inscripcion::create([
                    'user_id' => $user->id,
                    'taller_id' => $item->taller_id,
                ]);
            }

            Carrito::where('user_id', $user->id)->delete();

            Mail::to($user->email)->send(new CompraConfirmacion($compra));

            return redirect('/cliente')
                ->with('success', 'Compra realizada correctamente. Total: $' .
                    number_format($total, 0, ',', '.'));
        });
    }
}
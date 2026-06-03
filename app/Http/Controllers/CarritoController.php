<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrito;
use App\Models\Evento;
use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\MetodoPago;
use App\Models\Entrada;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompraConfirmacion;



class CarritoController extends Controller
{

     public function actualizarCantidad(Request $request, $id)
    {
        $item = Carrito::where('id', $id)
                       ->where('user_id', Auth::id())
                       ->firstOrFail();

        $request->validate([
            'cantidad' => 'required|integer|min:1'
        ]);

        $item->cantidad = $request->cantidad;
        $item->save();

        return redirect()->route('carrito.ver')->with('success', 'Cantidad actualizada');
    }

    
    public function agregar(Request $request, $id)
    {
        $evento = Evento::findOrFail($id);
        $user = Auth::user();

        $carrito = Carrito::where('user_id', $user->id)
                          ->where('evento_id', $id)
                          ->first();

        if ($carrito) {
            $carrito->cantidad += 1;
            $carrito->save();
        } else {
            Carrito::create([
                'user_id' => $user->id,
                'evento_id' => $id,
                'cantidad' => 1,
            ]);
        }

        return redirect()->route('carrito.ver')->with('success', 'Evento agregado al carrito');
    }

    public function verCarrito()
    {
        $carrito = Carrito::where('user_id', Auth::id())->with('evento')->get();
        $subtotal = $carrito->sum(function ($item) {
            return $item->cantidad * $item->evento->precio;
        });
        $comision = 2000;
        $total = $subtotal + $comision;

        $metodosPago = MetodoPago::where('activo', true)->get();

        return view('backend.carrito', compact('carrito', 'subtotal', 'comision', 'total', 'metodosPago'));
    }

    public function eliminar($id)
    {
        $item = Carrito::where('id', $id)
                       ->where('user_id', Auth::id())
                       ->firstOrFail();
        $item->delete();
        return redirect()->back()->with('success', 'Producto eliminado del carrito');
    }

    public function vaciar()
    {
        Carrito::where('user_id', Auth::id())->delete();
        return redirect()->back()->with('success', 'Carrito vaciado');
    }

    public function finalizarCompra(Request $request)
{
    $user = Auth::user();
    $carrito = Carrito::where('user_id', $user->id)->with('evento')->get();

    if ($carrito->isEmpty()) {
        return redirect()->route('carrito.ver')->with('error', 'El carrito está vacío');
    }

    $subtotal = $carrito->sum(function ($item) {
        return $item->cantidad * $item->evento->precio;
    });
    $comision = 2000;
    $total = $subtotal + $comision;

    $compra = Compra::create([
        'user_id' => $user->id,
        'total' => $total,
        'estado' => 'pagado',
        'metodo_pago_id' => $request->metodo_pago_id,
    ]);

    Mail::to($user->email)->send(new CompraConfirmacion($compra));

    foreach ($carrito as $item) {
        DetalleCompra::create([
            'compra_id' => $compra->id,
            'evento_id' => $item->evento_id,
            'cantidad' => $item->cantidad,
            'precio_unitario' => $item->evento->precio,
            'subtotal' => $item->cantidad * $item->evento->precio,
        ]);
    }

    // Actualizar stock
    foreach ($carrito as $item) {
        $evento = Evento::find($item->evento_id);
        $evento->stock_disponible -= $item->cantidad;
        $evento->save();
    }

    // Vaciar carrito
    Carrito::where('user_id', $user->id)->delete();

    return redirect('/cliente')->with('success', '¡Compra realizada con éxito! Total: $' . number_format($total, 0, ',', '.'));
}
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Compra;

class ClienteController extends Controller
{
    public function index()
    {
        return view('cliente.cliente');
    }

    public function historial()
    {
        $compras = Compra::where('user_id', Auth::id())
            ->with('detalles.evento')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('cliente.historial', compact('compras'));
    }

    public function talleres()
    {
        $talleres = Auth::user()
            ->talleres()
            ->orderBy('inscripciones.created_at', 'desc')
            ->get();

        return view('cliente.talleres', compact('talleres'));
    }

    // =========================
    // PERFIL CLIENTE
    // =========================

    public function perfil()
    {
        return view('cliente.perfil', [
            'usuario' => Auth::user()
        ]);
    }

    public function actualizarPerfil(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = Auth::user();

        $user->name = $request->name;
        $user->apellido = $request->apellido;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'min:6'
            ]);

            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Perfil actualizado correctamente');
    }
}
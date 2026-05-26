<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function index()
    {
        return view('backend.usuarios.cliente');
    }

    public function historial()
    {
    $compras = Compra::where('user_id', Auth::id())
                     ->with('entradas.evento')
                     ->orderBy('created_at', 'desc')
                     ->get();

    return view('backend.cliente.historial', compact('compras'));
    }
}

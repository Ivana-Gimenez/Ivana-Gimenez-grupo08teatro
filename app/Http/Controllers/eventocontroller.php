<?php

namespace App\Http\Controllers;

use App\Models\Evento;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::where('activo', true)->get();
        return view('principal', compact('eventos'));
    }
}
<?php

namespace App\Http\Controllers;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::where('activo', true)->get();
        return view('principal', compact('eventos'));
    }

    public function buscar(Request $request)
   {
    $query = $request->get('q');
    $eventos = Evento::where('nombre', 'LIKE', "%{$query}%")
                    ->where('activo', true)
                    ->get();

    return view('principal', compact('eventos'));
   }
}
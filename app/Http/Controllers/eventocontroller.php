<?php

namespace App\Http\Controllers;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = [
            ['nombre' => 'La Traviata - Ópera', 'fecha' => '15 de Mayo 2025', 'precio' => 25000],
            ['nombre' => 'Romeo y Julieta - Ballet', 'fecha' => '20 de Mayo 2025', 'precio' => 30000],
            ['nombre' => 'Concierto Sinfónico', 'fecha' => '25 de Mayo 2025', 'precio' => 20000],
        ];
        
        return view('principal', compact('eventos'));
    }
}
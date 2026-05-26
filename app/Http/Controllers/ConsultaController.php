<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class ConsultaController extends Controller
{
    public function showForm()
    {
        return view('consultas');
    }

    public function enviar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'tipo_consulta' => 'nullable|string|max:50',
            'mensaje' => 'required|string|min:10',
        ]);

        Consulta::create($request->all());

        return redirect()->route('consultas.form')->with('success', '¡Mensaje enviado con éxito! Te responderemos a la brevedad.');
    }
}

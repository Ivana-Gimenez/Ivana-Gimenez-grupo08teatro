<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Consulta;

class ContactoController extends Controller
{
    public function enviar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'mensaje' => 'required|string|min:10',
        ]);

        $data = $request->all();

        // =========================
        // 1. GUARDAR EN BASE DE DATOS
        // =========================
        Consulta::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'tipo_consulta' => 'Contacto',
            'mensaje' => $request->mensaje,
            'leido' => false
        ]);

        // =========================
        // 2. ENVIAR MAIL
        // =========================
        Mail::send('emails.contacto', $data, function ($message) use ($data) {
            $message->to('ctesteatrodelaciudad@gmail.com')
                ->subject('Nuevo mensaje de contacto')
                ->replyTo($data['email'], $data['nombre']);
        });

        // =========================
        // 3. RESPUESTA
        // =========================
        return redirect('/contacto')
            ->with('success', 'Mensaje enviado correctamente');
    }
}
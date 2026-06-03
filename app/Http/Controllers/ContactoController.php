<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function enviar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'mensaje' => 'required',
        ]);

        $data = $request->all();

        Mail::send('emails.contacto', $data, function ($message) use ($data) {
            $message->to('ctesteatrodelaciudad@gmail.com')
                    ->subject('Nuevo mensaje de contacto')
                    ->replyTo($data['email'], $data['nombre']);
        });

        return redirect('/contacto')->with('success', 'Mensaje enviado correctamente');
    }
}

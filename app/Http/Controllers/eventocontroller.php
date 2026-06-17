<?php

namespace App\Http\Controllers;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    // =========================
    // HOME (SOLO 6 EVENTOS)
    // =========================
    public function index()
    {
        $eventos = Evento::where('activo', 1)
            ->orderBy('fecha', 'asc')
            ->take(6)
            ->get();

        return view('principal', compact('eventos'));
    }

<<<<<<< HEAD
    // =========================
    // PRÓXIMOS EVENTOS
    // =========================
    public function proximos()
    {
        $eventos = Evento::where('activo', 1)
            ->orderBy('fecha', 'asc')
            ->get();

        return view('eventos.proximos', compact('eventos'));
    }

    // =========================
    // BUSCADOR
    // =========================
    public function buscar(Request $request)
    {
        $q = trim($request->q);

        if (!$q) {
            return redirect()->route('home');
        }

        $eventos = Evento::where('activo', 1)
            ->where(function ($query) use ($q) {
                $query->where('nombre', 'like', "%{$q}%")
                      ->orWhere('descripcion', 'like', "%{$q}%");
            })
            ->orderBy('fecha', 'asc')
            ->get();

        return view('principal', [
            'eventos' => $eventos,
            'busqueda' => $q
        ]);
    }

    // =========================
    // DETALLE
    // =========================
    public function show($id)
    {
        $evento = Evento::findOrFail($id);

        return view('eventos.show', compact('evento'));
    }
=======
    public function buscar(Request $request)
   {
    $query = $request->get('q');
    $eventos = Evento::where('nombre', 'LIKE', "%{$query}%")
                    ->where('activo', true)
                    ->get();

    return view('principal', compact('eventos'));
   }
>>>>>>> 90c245c27042119ffc11b9cbb7d2b6a50163a065
}
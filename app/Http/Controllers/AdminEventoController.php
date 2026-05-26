<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class AdminEventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();
        return view('backend.admin.eventos.index', compact('eventos'));
    }

    public function create()
    {
        return view('backend.admin.eventos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha' => 'required|date',
            'hora' => 'required',
            'precio' => 'required|numeric',
            'stock_total' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
            $imagen->move(public_path('img/eventos'), $nombreImagen);
            $data['imagen'] = $nombreImagen;
        }

        $data['stock_disponible'] = $request->stock_total;
        $data['activo'] = $request->has('activo');

        Evento::create($data);

        return redirect()->route('admin.eventos.index')->with('success', 'Evento creado correctamente');
    }

    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        return view('backend.admin.eventos.edit', compact('evento'));
    }

    public function update(Request $request, $id)
    {
        $evento = Evento::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha' => 'required|date',
            'hora' => 'required',
            'precio' => 'required|numeric',
            'stock_total' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            if ($evento->imagen && file_exists(public_path('img/eventos/' . $evento->imagen))) {
                unlink(public_path('img/eventos/' . $evento->imagen));
            }
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
            $imagen->move(public_path('img/eventos'), $nombreImagen);
            $data['imagen'] = $nombreImagen;
        }

        $data['stock_disponible'] = $request->stock_total - ($evento->stock_total - $evento->stock_disponible);
        $data['activo'] = $request->has('activo');

        $evento->update($data);

        return redirect()->route('admin.eventos.index')->with('success', 'Evento actualizado correctamente');
    }

    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();

        return redirect()->route('admin.eventos.index')->with('success', 'Evento eliminado correctamente');
    }
}
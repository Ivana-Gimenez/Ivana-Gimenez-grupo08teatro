<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;

class AdminConsultaController extends Controller
{
    public function index()
    {
        $consultas = Consulta::orderBy('created_at', 'desc')->get();
        return view('backend.admin.consultas.index', compact('consultas'));
    }

    public function marcarLeida($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->leido = true;
        $consulta->save();

        return redirect()->back()->with('success', 'Consulta marcada como leída');
    }

    public function destroy($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->delete();

        return redirect()->back()->with('success', 'Consulta eliminada correctamente');
    }
}
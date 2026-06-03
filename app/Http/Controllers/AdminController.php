<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('backend.admin.dashboard');
    }


    public function usuarios()
    {
        //$usuarios = User::where('rol_id', 2)->get(); // solo clientes
        $usuarios = User::all(); // trae todos los usuarios
        return view('backend.admin.usuarios.index', compact('usuarios'));
    }
    
}

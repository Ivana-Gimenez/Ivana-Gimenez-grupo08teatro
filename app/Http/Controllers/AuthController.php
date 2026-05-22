<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Muestra el formulario de registro
    public function formularioRegistro()
    {
        return view('backend.usuarios.registro');
    }

   public function registrar(Request $request)
  {
     
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'rol_id' => 2,
    ]);

    if (!$user) {
        return redirect('/en-construccion')->with('error', 'No se pudo crear el usuario');
    }

    Auth::login($user);

    return redirect('/cliente');
  }

    // Muestra el formulario de login
    public function formularioLogin()
    {
        return view('backend.usuarios.login');
    }

    // Procesa el login
    public function autenticar(Request $request)
    {
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->rol_id == 1) { // 1 = admin
                return redirect('/admin');
            }
            return redirect('/cliente');
        }

        return back()->withErrors([
            'email' => 'Email o contraseña incorrectos',
        ]);
    }

    // Cierra sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
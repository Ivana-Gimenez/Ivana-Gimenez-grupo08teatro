<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use Illuminate\Http\Request;

// Ruta principal - muestra los eventos usando el controlador
Route::get('/', [EventoController::class, 'index']);

// Rutas de las páginas estáticas
Route::get('/quienes-somos', function () {
    return view('quienes-somos');
});

Route::get('/boleteria', function () {
    return view('boleteria');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/terminos', function () {
    return view('terminos');
});



Route::get('/consultas', function () {
    return view('consultas');
});

Route::get('/talleres', function () {
    return view('talleres');
});

// Registro (GET)
Route::get('/registro', function () {
    return view('registro');
});

// Registro 
Route::post('/registro', function (Request $request) {
    return redirect('/')->with('success', 'Usuario registrado correctamente');
})->name('register');

// Login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Página en construcción
Route::get('/en-construccion', function () {
    return view('en-construccion');
});
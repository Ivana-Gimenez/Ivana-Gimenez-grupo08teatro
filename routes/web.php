<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;

// ============================================
// RUTAS PÚBLICAS
// ============================================

// Ruta principal - muestra los eventos
Route::get('/', [EventoController::class, 'index']);

// Páginas estáticas
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

// ============================================
// RUTAS DE AUTENTICACIÓN
// ============================================
Route::get('/registro', [AuthController::class, 'formularioRegistro'])->name('registro');
Route::post('/registro', [AuthController::class, 'registrar']);
Route::get('/login', [AuthController::class, 'formularioLogin'])->name('login');
Route::post('/login', [AuthController::class, 'autenticar']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ============================================
// RUTAS PROTEGIDAS POR ROL
// ============================================
Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);
});

Route::middleware(['auth', 'rol:cliente'])->group(function () {
    Route::get('/cliente', [ClienteController::class, 'index']);
});

// ============================================
// RUTA DE PRUEBA
// ============================================
Route::get('/prueba-redireccion', function () {
    return "Si ves esto, el enrutador funciona.";
});

// ============================================
// PÁGINA EN CONSTRUCCIÓN (si la necesitas, debe ir al final)
// ============================================
Route::get('/en-construccion', function () {
    return view('en-construccion');
});



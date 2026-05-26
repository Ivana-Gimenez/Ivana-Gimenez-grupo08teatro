<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AdminConsultaController;

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
    Route::resource('admin/eventos', App\Http\Controllers\AdminEventoController::class);
    Route::get('/admin/consultas', [AdminConsultaController::class, 'index'])->name('admin.consultas.index');
    Route::patch('/admin/consultas/{id}/leida', [AdminConsultaController::class, 'marcarLeida'])->name('admin.consultas.leida');
    Route::delete('/admin/consultas/{id}', [AdminConsultaController::class, 'destroy'])->name('admin.consultas.destroy');
});
    

Route::middleware(['auth', 'rol:cliente'])->group(function () {
    Route::get('/cliente', [ClienteController::class, 'index']);
    Route::get('/cliente/historial', [App\Http\Controllers\ClienteController::class, 'historial'])->name('cliente.historial');
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

// Rutas del carrito (requieren autenticación)
Route::middleware(['auth'])->group(function () {
    Route::post('/carrito/agregar/{id}', [App\Http\Controllers\CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::get('/carrito', [App\Http\Controllers\CarritoController::class, 'verCarrito'])->name('carrito.ver');
    Route::delete('/carrito/eliminar/{id}', [App\Http\Controllers\CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    Route::post('/carrito/vaciar', [App\Http\Controllers\CarritoController::class, 'vaciar'])->name('carrito.vaciar');
});

Route::post('/carrito/finalizar', [App\Http\Controllers\CarritoController::class, 'finalizarCompra'])->name('carrito.finalizar');

Route::get('/consultas', [App\Http\Controllers\ConsultaController::class, 'showForm'])->name('consultas.form');
Route::post('/consultas', [App\Http\Controllers\ConsultaController::class, 'enviar'])->name('consultas.enviar');


<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('main');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Ruta para alumnos
Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumnos');

// Ruta para cerrar sesión
Route::post('/logout', function () {
    Auth::logout();  // Cierra la sesión del usuario
    return redirect('/login');  // Redirige al usuario a la página de login
})->name('logout');

// Cargar rutas de autenticación
require __DIR__.'/auth.php';

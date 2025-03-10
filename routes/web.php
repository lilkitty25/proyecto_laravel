<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LanguageController;

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

// Add this route to your routes/web.php
Route::get('/home', function () {
    return redirect()->route('dashboard'); // Redirects to the dashboard
})->name('home');


// Ruta para alumnos
Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumnos');
Route::resource('alumnos', AlumnoController::class)->middleware(['auth', 'verified']);

// Ruta para cambiar idioma
Route::get('/language/{lang}', [LanguageController::class, 'switchLanguage'])->name('language.switch');

// Ruta para cerrar sesión
Route::post('/logout', function () {
    Auth::logout();  // Cierra la sesión del usuario
    return redirect('/login');  // Redirige al usuario a la página de login
})->name('logout');

// Cargar rutas de autenticación
require __DIR__.'/auth.php';

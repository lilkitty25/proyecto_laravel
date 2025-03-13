<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LanguageController;
use App\Models\Alumno;
use App\Models\Proyecto;

Route::get('/', function () {
    if (Auth::check()) {
        $totalAlumnos = Alumno::count();
        $totalProyectos = Proyecto::count();
        return view('home', compact('totalAlumnos', 'totalProyectos'));
    }
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    $totalAlumnos = \App\Models\Alumno::count();
    $totalProyectos = \App\Models\Proyecto::count();
    return view('home', compact('totalAlumnos', 'totalProyectos'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('/about', 'about')->name('about');
Route::view('/news', 'news')->name('news');
Route::view('/contact', 'contact')->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

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

<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::resource("alumnos",ApiAlumnosController::class);

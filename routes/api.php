<?php

use App\Http\Controllers\ApiAlumnosController;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;


Route::resource("alumnos",ApiAlumnosController::class);

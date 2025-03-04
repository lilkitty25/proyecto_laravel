<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlumnosCollection;
use App\Models\Alumno;
use Illuminate\Http\Request;

class ApiAlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new AlumnosCollection(Alumno::all());
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlumnosCollection;
use App\Http\Resources\AlumnosResource;
use App\Models\Alumno;
use Illuminate\Http\Request;

/**
 * @OA\Info (
 *       title="API de alumnos",
 *       version="1.0.0",
 *       description="Informacion de los alumnos del instituto"
 *
 *     @OA\Contact
 *       name="Nicole",
 *       email="correo@ejemplo.com",
 * ),
 *    @OA\License(
 *      name="MIT",
 *      url="https://opensource.org/license"
 *    )
 * )
 */

class ApiAlumnosController extends Controller
{
    /**
     * @OA\Get (
     *  path="/api/alumnos",
     *  operationId="GetAlumnos",
     * @OA\Response(
     *     response=200,
     *     description="Se  han listado todos los alumnos"
     * )
     * )
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
        $datos = $request->input("data.attributes");
        $alumno = new Alumno($datos);
        $alumno->save();
        return new AlumnosResource($alumno);
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

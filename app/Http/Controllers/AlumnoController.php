<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Models\Alumno;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Import DB for transactions

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $columns = Schema::getColumnListing("alumnos");
        $exclude = ["created_at", "updated_at"];
        $columns = array_diff($columns, $exclude);
        $alumnos = Alumno::select($columns)->get();

        return view('alumnos.index', compact('alumnos', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumnoRequest $request)
    {
        DB::transaction(function () use ($request) {
            $data = $request->only('nombre', 'email', 'edad');

            $alumno = Alumno::create($data);

            if ($request->has('idiomas')) {
                $idiomas = collect($request->input('idiomas'));
                $idiomas->each(function ($idioma) use ($alumno, $request) {
                    $alumno->idiomas()->create([
                        "idioma" => $idioma,
                        "nivel" => $request->input("nivel")[$idioma],
                        "titulo" => $request->input("titulo")[$idioma],
                    ]);
                });
            }

            session()->flash('mensaje', 'Alumno creado');
        });

        return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        DB::transaction(function () use ($request, $alumno) {
            $data = $request->only("nombre", "email", "edad");
            $alumno->update($data);

            $idiomas = $request->input("idiomas");
            $alumnoIdiomas = $alumno->idiomas->pluck('idioma')->toArray();

            $idiomasParaEliminar = array_diff($alumnoIdiomas, $idiomas);
            if ($idiomasParaEliminar) {
                $alumno->idiomas()->whereIn('idioma', $idiomasParaEliminar)->delete();
            }

            collect($idiomas)->each(function ($idioma) use ($request, $alumno) {
                $alumno->idiomas()->updateOrCreate(
                    ['idioma' => $idioma],
                    [
                        'nivel' => $request->input("niveles")[$idioma] ?? null,
                        'titulo' => $request->input("titulos")[$idioma] ?? null,
                    ]
                );
            });

            session()->flash("mensaje", "Alumno actualizado");
        });

        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        DB::transaction(function () use ($alumno) {
            $alumno->idiomas()->delete();
            $alumno->delete();
            session()->flash('mensaje', 'Alumno eliminado');
        });

        return redirect()->route('alumnos.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Models\Alumno;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Import DB for transactions

class AlumnoController extends Controller
{

    public function index()
    {
        $columns = Schema::getColumnListing("alumnos");
        $exclude = ["created_at", "updated_at"];
        $columns = array_diff($columns, $exclude);
        $alumnos = Alumno::with('idiomas')->select($columns)->get();

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

            $data = $request->only('nombre', 'email', 'dni');

            $alumno= new Alumno($data);
            


            $alumno->save();

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
        $idiomas_disponibles = ['Inglés', 'Francés', 'Alemán', 'Italiano', 'Portugués', 'Chino'];
        $niveles = ['A1', 'A2', 'B1', 'B2', 'C1', 'C2'];
        return view('alumnos.edit', compact('alumno', 'idiomas_disponibles', 'niveles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        try {
            DB::transaction(function () use ($request, $alumno) {
                // Actualizar datos básicos del alumno
                $alumno->update($request->only(['nombre', 'email', 'dni']));

                // Manejar idiomas
                if ($request->has('idiomas')) {
                    // Obtener los idiomas actuales y nuevos
                    $idiomas = $request->input('idiomas', []);
                    
                    // Eliminar idiomas que ya no están en la lista
                    $alumno->idiomas()->whereNotIn('idioma', $idiomas)->delete();

                    // Actualizar o crear idiomas
                    foreach ($idiomas as $idioma) {
                        $alumno->idiomas()->updateOrCreate(
                            ['idioma' => $idioma],
                            [
                                'nivel' => $request->input("nivel.{$idioma}"),
                                'titulo' => $request->input("titulo.{$idioma}")
                            ]
                        );
                    }
                } else {
                    // Si no hay idiomas seleccionados, eliminar todos
                    $alumno->idiomas()->delete();
                }

                session()->flash('mensaje', 'Alumno actualizado correctamente');
            });

            return redirect()->route('alumnos.index');
        } catch (\Exception $e) {
            // Log del error para debugging
            \Log::error('Error actualizando alumno: ' . $e->getMessage());
            
            return back()
                ->withInput()
                ->withErrors(['error' => 'Error al actualizar el alumno. Por favor, inténtalo de nuevo.']);
        }
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

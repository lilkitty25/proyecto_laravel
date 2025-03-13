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
        
        // Cargar los alumnos con sus idiomas usando eager loading
        $alumnos = Alumno::with(['idiomas' => function($query) {
            $query->select('id', 'alumno_id', 'idioma', 'nivel', 'titulo');
        }])->get();

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
        try {
            // Crear el alumno con los datos básicos
            $alumno = Alumno::create([
                'nombre' => $request->nombre,
                'email' => $request->email,
                'dni' => $request->dni
            ]);

            // Si hay idiomas seleccionados, los procesamos
            if ($request->has('idiomas')) {
                foreach ($request->idiomas as $idioma) {
                    $alumno->idiomas()->create([
                        'idioma' => $idioma,
                        'nivel' => $request->input("nivel.$idioma"),
                        'titulo' => $request->input("titulo.$idioma")
                    ]);
                }
            }

            return redirect()
                ->route('alumnos.index')
                ->with('success', 'Alumno creado correctamente');

        } catch (\Exception $e) {
            \Log::error('Error al crear alumno: ' . $e->getMessage());
            return back()
                ->withInput()
                ->withErrors(['error' => 'Error al crear el alumno. Por favor, inténtalo de nuevo.']);
        }
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
        $idiomas_disponibles = config('idiomas');
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
                $alumno->fill($request->only(['nombre', 'email', 'dni']));
                $alumno->save();

                // Eliminar todos los idiomas actuales
                $alumno->idiomas()->delete();

                // Procesar los idiomas seleccionados
                if ($request->has('idiomas')) {
                    foreach ($request->idiomas as $idioma) {
                        // Solo crear si hay un nivel seleccionado
                        if ($request->input("nivel.$idioma")) {
                            $alumno->idiomas()->create([
                                'idioma' => $idioma,
                                'nivel' => $request->input("nivel.$idioma"),
                                'titulo' => $request->input("titulo.$idioma")
                            ]);
                        }
                    }
                }
            });

            return redirect()
                ->route('alumnos.index')
                ->with('success', 'Alumno actualizado correctamente');

        } catch (\Exception $e) {
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

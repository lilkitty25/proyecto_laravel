<!-- resources/views/alumnos/edit.blade.php -->

<x-layouts.layout>
    <div class="p-4">
        <h2 class="text-2xl font-semibold mb-4">Editar Alumno</h2>

        <!-- Formulario de edición de alumno -->
        <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT') <!-- Indicamos que es una actualización -->

            <div class="mb-4">
                <label for="nombre" class="block text-lg">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $alumno->nombre) }}" class="w-full p-2 border rounded-lg" required>
                @error('nombre')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
<<<<<<< Updated upstream
                <label for="apellido" class="block text-lg">Apellido</label>
                <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $alumno->apellido) }}" class="w-full p-2 border rounded-lg" required>
                @error('apellido')
=======
                <label for="email" class="block text-lg">Correo Electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email', $alumno->email) }}" class="w-full p-2 border rounded-lg" required>
                @error('email')
>>>>>>> Stashed changes
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
<<<<<<< Updated upstream
                <label for="fecha_nacimiento" class="block text-lg">Fecha de Nacimiento</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}" class="w-full p-2 border rounded-lg" required>
                @error('fecha_nacimiento')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="correo_electronico" class="block text-lg">Correo Electrónico</label>
                <input type="email" id="correo_electronico" name="correo_electronico" value="{{ old('correo_electronico', $alumno->correo_electronico) }}" class="w-full p-2 border rounded-lg" required>
                @error('correo_electronico')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="fecha_inscripcion" class="block text-lg">Fecha de Inscripción</label>
                <input type="date" id="fecha_inscripcion" name="fecha_inscripcion" value="{{ old('fecha_inscripcion', $alumno->fecha_inscripcion) }}" class="w-full p-2 border rounded-lg" required>
                @error('fecha_inscripcion')
=======
                <label for="edad" class="block text-lg">Edad</label>
                <input type="text" id="edad" name="edad" value="{{ old('edad', $alumno->edad) }}" class="w-full p-2 border rounded-lg" required>
                @error('edad')
>>>>>>> Stashed changes
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn bg-purple-600 text-white hover:bg-purple-700 px-6 py-2 rounded-lg shadow-lg">
                Actualizar Alumno
            </button>
        </form>
    </div>
</x-layouts.layout>

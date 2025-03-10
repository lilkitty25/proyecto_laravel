<x-layouts.layout>
    <div class="p-4">
        <h2 class="text-2xl font-semibold mb-4 text-gradient bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-pink-500">Editar Alumno</h2>

        <!-- Formulario de edición de alumno -->
        <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST" class="space-y-4 max-w-sm mx-auto">
            @csrf
            @method('PUT') <!-- Indicamos que es una actualización -->

            <div class="mb-4">
                <label for="nombre" class="block text-lg text-gradient bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-pink-500">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $alumno->nombre) }}" class="w-full p-2 border-2 border-gradient-to-r from-purple-600 to-pink-500 rounded-lg text-sm" required>
                @error('nombre')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-lg text-gradient bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-pink-500">Correo Electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email', $alumno->email) }}" class="w-full p-2 border-2 border-gradient-to-r from-purple-600 to-pink-500 rounded-lg text-sm" required>
                @error('email')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="dni" class="block text-lg text-gradient bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-pink-500">DNI</label>
                <input type="text" id="dni" name="dni" value="{{ old('dni', $alumno->dni) }}" class="w-full p-2 border-2 border-gradient-to-r from-purple-600 to-pink-500 rounded-lg text-sm" required>
                @error('dni')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-500 text-white hover:bg-gradient-to-r hover:from-purple-700 hover:to-pink-600 px-6 py-2 rounded-lg shadow-lg text-sm">
                Actualizar Alumno
            </button>
        </form>
    </div>
</x-layouts.layout>

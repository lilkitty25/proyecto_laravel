<x-layouts.layout>
    <div class="p-4">
        <!-- Botón para agregar nuevo alumno -->
        <a href="{{ route('alumnos.create') }}" class="btn bg-purple-600 text-white hover:bg-purple-700 mb-4 px-6 py-2 rounded-lg shadow-lg transition-all duration-300">
            Agregar Nuevo Alumno
        </a>

        <div class="overflow-x-auto mt-6">
            <!-- Tabla Responsiva -->
            <table class="table table-xs table-pin-rows table-pin-cols border-separate border-spacing-2 rounded-lg shadow-xl table-auto w-full text-gray-900 bg-gradient-to-r from-purple-300 via-pink-200 to-purple-400">
                <thead class="bg-purple-600 text-white">
                <tr>
                    <th class="px-6 py-4 text-lg font-semibold bg-purple-600 text-white">Nombre</th>
                    <th class="px-6 py-4 text-lg font-semibold bg-purple-600 text-white">Apellido</th>
                    <th class="px-6 py-4 text-lg font-semibold bg-purple-600 text-white">Fecha de Nacimiento</th>
                    <th class="px-6 py-4 text-lg font-semibold bg-purple-600 text-white">Correo Electrónico</th>
                    <th class="px-6 py-4 text-lg font-semibold bg-purple-600 text-white">Fecha de Inscripción</th>
                    <th class="px-6 py-4 text-lg font-semibold bg-purple-600 text-white">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($alumnos as $alumno)
                    <tr class="hover:bg-purple-100 transition-colors duration-300">
                        <td class="px-6 py-4">{{ $alumno->nombre }}</td>
                        <td class="px-6 py-4">{{ $alumno->apellido }}</td>
                        <td class="px-6 py-4">{{ $alumno->fecha_nacimiento }}</td>
                        <td class="px-6 py-4">{{ $alumno->correo_electronico }}</td>
                        <td class="px-6 py-4">{{ $alumno->fecha_inscripcion }}</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <!-- Botón de editar con icono SVG -->
                            <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn bg-purple-600 text-white hover:bg-purple-700 rounded px-4 py-2 shadow-md transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232a3 3 0 114.242 4.242l-9.49 9.49-3.033.76a1 1 0 01-1.226-1.225l.76-3.032 9.49-9.49z"/>
                                </svg>
                            </a>

                            <!-- Formulario para eliminar con icono SVG -->
                            <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este alumno?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn bg-red-600 text-white hover:bg-red-700 rounded px-4 py-2 shadow-md transition-all duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.layout>

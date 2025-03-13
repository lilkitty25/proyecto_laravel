<x-layouts.layout>
    <div class="p-4">
        <!-- Verificar si hay un mensaje de éxito en la sesión -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        <div class="p-2 flex flex-row justify-start items-center space-x-2">
            <a href="{{ route('alumnos.create') }}" class="btn btn-sm bg-gradient-to-r from-pink-400 to-purple-500 text-white hover:from-pink-500 hover:to-purple-600">Crear Alumno</a>
            <a href="{{ route('home') }}" class="btn btn-sm bg-gradient-to-r from-pink-400 to-purple-500 text-white hover:from-pink-500 hover:to-purple-600">Volver</a>
        </div>
        <div class="overflow-x-auto mt-6">
            <!-- Tabla Responsiva -->
            <table class="table table-xs table-pin-rows table-pin-cols border-separate border-spacing-2 rounded-lg shadow-xl table-auto w-full text-gray-900 bg-gradient-to-r from-purple-300 via-pink-200 to-purple-400">
                <thead class="bg-purple-600 text-white">
                <tr>
                    <th class="px-6 py-4 text-lg font-semibold bg-purple-600 text-white">Nombre</th>
                    <th class="px-6 py-4 text-lg font-semibold bg-purple-600 text-white">Correo Electrónico</th>
                    <th class="px-6 py-4 text-lg font-semibold bg-purple-600 text-white">DNI</th>
                    <th class="px-6 py-4 text-lg font-semibold bg-purple-600 text-white">Idiomas</th>
                    <th class="px-6 py-4 text-lg font-semibold bg-purple-600 text-white">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($alumnos as $alumno)
                    <tr class="hover:[background-color:#E749A1] hover:bg-opacity-20 transition-colors duration-300">
                        <td class="px-6 py-4 text-purple-800 text-sm font-semibold">{{ $alumno->nombre }}</td>
                        <td class="px-6 py-4 text-purple-800 text-sm font-semibold">{{ $alumno->email }}</td>
                        <td class="px-6 py-4 text-purple-800 text-sm font-semibold">{{ $alumno->dni }}</td>
                        <td class="px-6 py-4 text-purple-800 text-sm font-semibold">
                            @if($alumno->idiomas->count() > 0)
                                <div class="flex flex-col gap-1">
                                @foreach($alumno->idiomas as $idioma)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-purple-100 text-purple-800">
                                        {{ $idioma->idioma }} ({{ $idioma->nivel }})
                                        @if($idioma->titulo)
                                            <span class="ml-1 text-purple-600">✓</span>
                                        @endif
                                    </span>
                                @endforeach
                                </div>
                            @else
                                <span class="text-gray-500 italic font-semibold">Sin idiomas</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-purple-800 text-sm font-semibold flex space-x-2">
                            <!-- Botón de editar con icono SVG -->
                            <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn bg-purple-600 text-white hover:bg-purple-700 rounded px-4 py-2 shadow-md transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232a3 3 0 114.242 4.242l-9.49 9.49-3.033.76a1 1 0 01-1.226-1.225l.76-3.032 9.49-9.49z"/>
                                </svg>
                            </a>

                            <!-- Formulario para eliminar con icono SVG -->
                            <form id="formulario{{$alumno->id}}" action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" onsubmit="event.preventDefault()">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmarDelete({{ $alumno->id }})" class="btn bg-red-600 text-white hover:bg-red-700 rounded px-4 py-2 shadow-md transition-all duration-300">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M10 12L14 16M14 12L10 16M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <script>
            function confirmarDelete(id) {
                const formulario = document.getElementById('formulario' + id);

                if (confirm('¿Estás seguro de que deseas eliminar este alumno?')) {
                    formulario.submit();
                }
            }
        </script>


    </div>
</x-layouts.layout>

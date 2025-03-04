<x-layouts.layout>
    <div class="p-4">
        <!-- Verificar si hay un mensaje de éxito en la sesión -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

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

    @if (session("mensaje"))
        <div role="alert" class="alert alert-success bg-gradient-to-r from-pink-500 via-purple-500 to-pink-400 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('mensaje') }}</span>

        </div>
    @endif

    <div class="p-2 flex flex-row justify-start items-center space-x-2">
        <a href="{{ route('alumnos.create') }}" class="btn btn-sm bg-gradient-to-r from-pink-400 to-purple-500 text-white hover:from-pink-500 hover:to-purple-600">Crear Alumno</a>
        <a href="{{ route('home') }}" class="btn btn-sm bg-gradient-to-r from-pink-400 to-purple-500 text-white hover:from-pink-500 hover:to-purple-600">Volver</a>
    </div>


    <script>
        function confirmarDelete(id) {
            const formulario = document.getElementById('formulario' + id);

            if (confirm('¿Estás seguro de que deseas eliminar este alumno?')) {
                formulario.submit();
            }

    <div class="max-h-full overflow-x-auto mt-4">
        <table class="table table-xs table-pin-rows table-pin-cols">
            <thead class="bg-gradient-to-r from-pink-400 to-purple-500 text-white">
            <tr>
                @foreach($campos as $campo)
                    <th>{{ $campo }}</th>
                @endforeach
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($filas as $fila)
                <tr class="border-b border-gray-200 hover:bg-gradient-to-r from-pink-100 to-purple-100">
                    @foreach($campos as $campo)
                        <td class="p-2">{{ $fila->$campo }}</td>
                    @endforeach

                    <td>
                        <!-- Edit button -->
                        <a href="{{ route('alumnos.edit', $fila->id) }}" aria-label="Editar alumno {{ $fila->id }}" class="text-purple-500 hover:text-pink-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hover:bg-purple-100 hover:rounded-full p-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a>
                    </td>

                    <td>
                        <!-- Delete button -->
                        <form id="formulario{{ $fila->id }}" action="{{ route('alumnos.destroy', $fila->id) }}" method="POST" onsubmit="event.preventDefault(); confirmDelete({{ $fila->id }})">
                            @method('DELETE')
                            @csrf
                            <button type="submit" style="display: none;"></button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hover:bg-red-400 hover:text-white hover:rounded-full p-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                            </svg>
                        </form>
                    </td>

                    <td>
                        <a href="{{ route('alumnos.show', $fila->id) }}" class="text-pink-500 hover:text-purple-500" aria-label="Ver alumno {{ $fila->id }}">Ver</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</x-layouts.layout>

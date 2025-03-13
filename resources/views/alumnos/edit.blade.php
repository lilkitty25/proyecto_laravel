<x-layouts.layout>
    <div class="p-4">
        <h2 class="text-2xl font-semibold mb-4 text-gradient bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-pink-500">Editar Alumno</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">¡Error!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario de edición de alumno -->
        <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST" 
              class="space-y-4 max-w-2xl mx-auto p-6 rounded-lg shadow-xl bg-gradient-to-r from-purple-300 via-pink-200 to-purple-400">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nombre" class="block text-lg font-medium text-gray-800">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $alumno->nombre) }}" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 bg-white/70" required>
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-lg font-medium text-gray-800">Correo Electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email', $alumno->email) }}" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 bg-white/70" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="dni" class="block text-lg font-medium text-gray-800">DNI</label>
                <input type="text" id="dni" name="dni" value="{{ old('dni', $alumno->dni) }}" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 bg-white/70" required>
                @error('dni')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Sección de Idiomas -->
            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-700 mb-4">Idiomas</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($idiomas_disponibles as $idioma)
                        <div class="bg-white/50 backdrop-blur-sm p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                            <div class="flex items-center mb-3">
                                <input type="checkbox" 
                                       id="idioma_{{ $idioma }}" 
                                       name="idiomas[]" 
                                       value="{{ $idioma }}"
                                       {{ $alumno->idiomas->contains('idioma', $idioma) ? 'checked' : '' }}
                                       class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                <label for="idioma_{{ $idioma }}" class="ml-2 block text-sm font-medium text-gray-800">
                                    {{ $idioma }}
                                </label>
                            </div>
                            
                            <div class="ml-6 space-y-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nivel:</label>
                                    <select name="nivel[{{ $idioma }}]" 
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 bg-white/70">
                                        <option value="">Selecciona un nivel</option>
                                        @foreach(['A1', 'A2', 'B1', 'B2', 'C1', 'C2'] as $nivel)
                                            <option value="{{ $nivel }}" 
                                                {{ $alumno->idiomas->where('idioma', $idioma)->first()?->nivel == $nivel ? 'selected' : '' }}>
                                                {{ $nivel }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Título:</label>
                                    <input type="text" 
                                           name="titulo[{{ $idioma }}]" 
                                           value="{{ $alumno->idiomas->where('idioma', $idioma)->first()?->titulo }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 bg-white/70"
                                           placeholder="Nombre del título">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('alumnos.index') }}" 
                   class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-purple-700 bg-white/70 hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors duration-200">
                    Cancelar
                </a>
                <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors duration-200">
                    Actualizar
                </button>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        function toggleIdiomaDetails(idioma) {
            const checkbox = document.getElementById('idioma_' + idioma);
            const detalles = document.getElementById('detalles_' + idioma);
            
            if (checkbox.checked) {
                detalles.classList.remove('hidden');
            } else {
                detalles.classList.add('hidden');
            }
        }
    </script>
    @endpush
</x-layouts.layout>

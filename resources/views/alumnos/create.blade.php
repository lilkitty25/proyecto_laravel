<x-layouts.layout>
    <div class="min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="p-6">
                <h2 class="text-2xl font-semibold mb-6 text-gradient bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-pink-500">Crear Nuevo Alumno</h2>

                @if ($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Hay errores en el formulario:</h3>
                                <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('alumnos.store') }}" method="POST" 
                      class="table table-xs table-pin-rows table-pin-cols border-separate border-spacing-2 rounded-lg shadow-xl table-auto w-full text-gray-900 bg-gradient-to-r from-purple-300 via-pink-200 to-purple-400 p-6">
                    @csrf
                    
                    <!-- Datos básicos del alumno -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-800">Nombre</label>
                                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 bg-white/70">
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-800">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 bg-white/70">
                            </div>

                            <div>
                                <label for="dni" class="block text-sm font-medium text-gray-800">DNI</label>
                                <input type="text" id="dni" name="dni" value="{{ old('dni') }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 bg-white/70">
                            </div>
                        </div>

                        <!-- Sección de Idiomas -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-medium text-gray-800">Idiomas (Opcional)</h3>
                            <div class="space-y-4">
                                @foreach(config('idiomas') as $idioma)
                                    <div class="bg-white/50 backdrop-blur-sm p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                                        <div class="flex items-center space-x-3 mb-3">
                                            <input type="checkbox" 
                                                   id="idioma_{{ $idioma }}" 
                                                   name="idiomas[]" 
                                                   value="{{ $idioma }}"
                                                   {{ in_array($idioma, old('idiomas', [])) ? 'checked' : '' }}
                                                   class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                            <label for="idioma_{{ $idioma }}" 
                                                   class="text-sm font-medium text-gray-800">{{ $idioma }}</label>
                                        </div>

                                        <div class="ml-6 space-y-3">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-800 mb-1">Nivel:</label>
                                                <select name="nivel[{{ $idioma }}]" 
                                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 bg-white/70">
                                                    <option value="">Selecciona un nivel</option>
                                                    @foreach(['A1', 'A2', 'B1', 'B2', 'C1', 'C2'] as $nivel)
                                                        <option value="{{ $nivel }}" 
                                                            {{ old("nivel.$idioma") == $nivel ? 'selected' : '' }}>
                                                            {{ $nivel }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                            <div>
                                                <label class="block text-sm font-medium text-gray-800 mb-1">Título:</label>
                                                <input type="text" 
                                                       name="titulo[{{ $idioma }}]" 
                                                       value="{{ old("titulo.$idioma") }}"
                                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 bg-white/70"
                                                       placeholder="Nombre del título">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <a href="{{ route('alumnos.index') }}" 
                           class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-purple-700 bg-white/70 hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors duration-200">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors duration-200">
                            Crear Alumno
                        </button>
                    </div>
                </form>
            </div>
        </div>
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

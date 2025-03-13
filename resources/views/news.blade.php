<x-layouts.layout>
    <div class="min-h-screen bg-gradient-to-r from-purple-100 to-pink-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-xl overflow-hidden">
                <div class="p-8">
                    <h1 class="text-4xl font-bold text-purple-800 mb-8">Noticias y Eventos</h1>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Noticia 1 -->
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-lg overflow-hidden shadow-md">
                            <img src="https://via.placeholder.com/400x200" alt="Evento 1" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <div class="text-sm text-purple-600 mb-2">12 Marzo, 2025</div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Nuevo Programa de Intercambio</h3>
                                <p class="text-gray-600 mb-4">
                                    Lanzamos nuestro nuevo programa de intercambio internacional con universidades de Europa.
                                </p>
                                <a href="#" class="text-purple-600 hover:text-purple-800 font-medium">Leer más →</a>
                            </div>
                        </div>

                        <!-- Noticia 2 -->
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-lg overflow-hidden shadow-md">
                            <img src="https://via.placeholder.com/400x200" alt="Evento 2" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <div class="text-sm text-purple-600 mb-2">10 Marzo, 2025</div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Feria de Empleo Virtual</h3>
                                <p class="text-gray-600 mb-4">
                                    Participa en nuestra próxima feria de empleo virtual con empresas líderes del sector.
                                </p>
                                <a href="#" class="text-purple-600 hover:text-purple-800 font-medium">Leer más →</a>
                            </div>
                        </div>

                        <!-- Noticia 3 -->
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-lg overflow-hidden shadow-md">
                            <img src="https://via.placeholder.com/400x200" alt="Evento 3" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <div class="text-sm text-purple-600 mb-2">8 Marzo, 2025</div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Nuevos Cursos de Especialización</h3>
                                <p class="text-gray-600 mb-4">
                                    Ampliamos nuestra oferta educativa con nuevos cursos de especialización tecnológica.
                                </p>
                                <a href="#" class="text-purple-600 hover:text-purple-800 font-medium">Leer más →</a>
                            </div>
                        </div>
                    </div>

                    <!-- Botón para cargar más noticias -->
                    <div class="text-center mt-8">
                        <button class="bg-gradient-to-r from-purple-600 to-pink-500 text-white px-6 py-3 rounded-lg font-medium hover:from-purple-700 hover:to-pink-600 transition-colors duration-200">
                            Cargar más noticias
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout>

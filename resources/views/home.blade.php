<x-layouts.layout>
    <div class="min-h-screen bg-gradient-to-r from-purple-100 to-pink-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-purple-800 mb-8">Bienvenido a nuestro Instituto</h1>
                <p class="text-xl text-gray-600 mb-12">Formando profesionales del futuro</p>
            </div>

            <!-- Contadores -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <div class="bg-white p-8 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">
                    <div class="text-center">
                        <div class="text-5xl font-bold text-purple-600 mb-4">{{ $totalAlumnos }}</div>
                        <div class="text-gray-600 text-xl">Alumnos Registrados</div>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">
                    <div class="text-center">
                        <div class="text-5xl font-bold text-pink-600 mb-4">{{ $totalProyectos }}</div>
                        <div class="text-gray-600 text-xl">Proyectos Activos</div>
                    </div>
                </div>
            </div>

            <!-- Características -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-purple-800 mb-4">Educación de Calidad</h3>
                    <p class="text-gray-600">Ofrecemos una formación integral con los mejores profesionales del sector.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-purple-800 mb-4">Proyectos Innovadores</h3>
                    <p class="text-gray-600">Desarrollamos proyectos que preparan a nuestros alumnos para el mundo real.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-purple-800 mb-4">Futuro Profesional</h3>
                    <p class="text-gray-600">Alta tasa de empleabilidad y conexiones con empresas líderes.</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout>

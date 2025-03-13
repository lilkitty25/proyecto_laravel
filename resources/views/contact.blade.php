<x-layouts.layout>
    <div class="min-h-screen bg-gradient-to-r from-purple-100 to-pink-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-xl overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <!-- Información de contacto -->
                    <div class="bg-gradient-to-r from-purple-600 to-pink-500 p-8 text-white">
                        <h2 class="text-2xl font-bold mb-6">Información de Contacto</h2>
                        
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <svg class="w-6 h-6 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <div>
                                    <h3 class="font-semibold">Dirección</h3>
                                    <p>Calle Principal 123</p>
                                    <p>28001 Madrid, España</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <svg class="w-6 h-6 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <div>
                                    <h3 class="font-semibold">Teléfono</h3>
                                    <p>+34 912 345 678</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <svg class="w-6 h-6 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <div>
                                    <h3 class="font-semibold">Email</h3>
                                    <p>info@instituto.com</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <svg class="w-6 h-6 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div>
                                    <h3 class="font-semibold">Horario</h3>
                                    <p>Lunes - Viernes: 9:00 - 18:00</p>
                                    <p>Sábado: 9:00 - 13:00</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Formulario de contacto -->
                    <div class="p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Envíanos un mensaje</h2>
                        
                        <form class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nombre completo</label>
                                <input type="text" class="w-full px-4 py-2 border rounded-md focus:ring-purple-500 focus:border-purple-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" class="w-full px-4 py-2 border rounded-md focus:ring-purple-500 focus:border-purple-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Asunto</label>
                                <input type="text" class="w-full px-4 py-2 border rounded-md focus:ring-purple-500 focus:border-purple-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Mensaje</label>
                                <textarea rows="4" class="w-full px-4 py-2 border rounded-md focus:ring-purple-500 focus:border-purple-500"></textarea>
                            </div>

                            <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-500 text-white py-2 px-4 rounded-md hover:from-purple-700 hover:to-pink-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                Enviar mensaje
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout>

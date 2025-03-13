<x-layouts.layout>
    <div class="min-h-screen bg-gradient-to-r from-purple-100 to-pink-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-purple-800 mb-8">Bienvenido a nuestro Instituto</h1>
                <p class="text-xl text-gray-600 mb-12">Formando profesionales del futuro</p>
            </div>

            <!-- Contador -->
            <div class="text-center mb-12">
                <h2 class="text-2xl font-semibold text-purple-700 mb-4">Próximo evento en:</h2>
                <div class="flex justify-center gap-4">
                    <div id="days" class="bg-white p-4 rounded-lg shadow-md">
                        <span class="text-3xl font-bold text-purple-600">00</span>
                        <p class="text-gray-600">Días</p>
                    </div>
                    <div id="hours" class="bg-white p-4 rounded-lg shadow-md">
                        <span class="text-3xl font-bold text-purple-600">00</span>
                        <p class="text-gray-600">Horas</p>
                    </div>
                    <div id="minutes" class="bg-white p-4 rounded-lg shadow-md">
                        <span class="text-3xl font-bold text-purple-600">00</span>
                        <p class="text-gray-600">Minutos</p>
                    </div>
                    <div id="seconds" class="bg-white p-4 rounded-lg shadow-md">
                        <span class="text-3xl font-bold text-purple-600">00</span>
                        <p class="text-gray-600">Segundos</p>
                    </div>
                </div>
            </div>

            <!-- Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <!-- Laravel Card -->
                <div class="card bg-white shadow-xl hover:shadow-2xl transition-shadow duration-300">
                    <figure class="px-10 pt-10">
                        <img src="{{ asset('img/laravel.jpg') }}" alt="Laravel" class="rounded-xl" />
                    </figure>
                    <div class="card-body items-center text-center">
                        <h2 class="card-title">Laravel</h2>
                        <p>Framework PHP que hace el desarrollo web elegante y divertido.</p>
                        <div class="card-actions">
                            <a href="https://laravel.com" target="_blank" class="btn btn-primary">Aprende más</a>
                        </div>
                    </div>
                </div>

                <!-- DaisyUI Card -->
                <div class="card bg-white shadow-xl hover:shadow-2xl transition-shadow duration-300">
                    <figure class="px-10 pt-10">
                        <img src="{{ asset('img/daisy.webp') }}" alt="DaisyUI" class="rounded-xl" />
                    </figure>
                    <div class="card-body items-center text-center">
                        <h2 class="card-title">DaisyUI</h2>
                        <p>Los componentes más populares y gratuitos para Tailwind CSS.</p>
                        <div class="card-actions">
                            <a href="https://daisyui.com" target="_blank" class="btn btn-primary">Aprende más</a>
                        </div>
                    </div>
                </div>

                <!-- Breeze Card -->
                <div class="card bg-white shadow-xl hover:shadow-2xl transition-shadow duration-300">
                    <figure class="px-10 pt-10">
                        <img src="{{ asset('img/breeze-register.png') }}" alt="Breeze" class="rounded-xl" />
                    </figure>
                    <div class="card-body items-center text-center">
                        <h2 class="card-title">Breeze</h2>
                        <p>Implementación mínima y simple de todas las características de autenticación de Laravel.</p>
                        <div class="card-actions">
                            <a href="https://laravel.com/docs/starter-kits#laravel-breeze" target="_blank" class="btn btn-primary">Aprende más</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
    <script>
        // Establecer la fecha objetivo: 14 de febrero de 2025 a las 00:00
        const targetDate = new Date('2025-02-14T00:00:00');

        function updateCountdown() {
            const currentDate = new Date();
            const difference = targetDate - currentDate;

            const days = Math.floor(difference / (1000 * 60 * 60 * 24));
            const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((difference % (1000 * 60)) / 1000);

            document.getElementById('days').querySelector('span').textContent = days.toString().padStart(2, '0');
            document.getElementById('hours').querySelector('span').textContent = hours.toString().padStart(2, '0');
            document.getElementById('minutes').querySelector('span').textContent = minutes.toString().padStart(2, '0');
            document.getElementById('seconds').querySelector('span').textContent = seconds.toString().padStart(2, '0');
        }

        // Actualizar el contador cada segundo
        setInterval(updateCountdown, 1000);
        updateCountdown(); // Actualizar inmediatamente al cargar
    </script>
    @endpush
</x-layouts.layout>

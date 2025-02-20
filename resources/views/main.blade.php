<x-layouts.layout>
    <!-- Banner de Bienvenida -->
    <div class="bg-gradient-to-r from-pink-500 to-red-500 p-8 text-center text-white rounded-lg mb-8">
        <h2 class="text-3xl font-bold">¡Bienvenidos a mi proyecto de repaso de Laravel!</h2>
        <p class="text-xl mt-4">La fecha se acerca... ¡Te presento mi proyecto!</p>
    </div>

    <!-- Contador de tiempo -->
    <div class="mt-8 mb-8 mx-4 sm:mx-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 text-center justify-center">
            <div class="bg-base-200 rounded-lg text-base-content flex flex-col p-4 shadow-lg items-center">
                <span id="days" class="countdown font-mono text-4xl sm:text-5xl text-primary"></span>
                <p class="text-xl font-semibold">Days</p>
            </div>
            <div class="bg-base-200 rounded-lg text-base-content flex flex-col p-4 shadow-lg items-center">
                <span id="hours" class="countdown font-mono text-4xl sm:text-5xl text-primary"></span>
                <p class="text-xl font-semibold">Hours</p>
            </div>
            <div class="bg-base-200 rounded-lg text-base-content flex flex-col p-4 shadow-lg items-center">
                <span id="minutes" class="countdown font-mono text-4xl sm:text-5xl text-primary"></span>
                <p class="text-xl font-semibold">Minutes</p>
            </div>
            <div class="bg-base-200 rounded-lg text-base-content flex flex-col p-4 shadow-lg items-center">
                <span id="seconds" class="countdown font-mono text-4xl sm:text-5xl text-primary"></span>
                <p class="text-xl font-semibold">Seconds</p>
            </div>
        </div>
    </div>

    <!-- Descripción del Proyecto - Tres cards en fila con Laravel, DaisyUI y Breeze -->
    <div class="flex flex-wrap justify-center gap-8 my-8 mx-4 sm:mx-8">
        <!-- Laravel Card -->
        <div class="card glass w-full sm:w-96">
            <figure>
                <img src="img/laravel.jpg" alt="Laravel" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">Laravel</h2>
                <p>Laravel es un framework de PHP que facilita el desarrollo web. Ofrece una sintaxis elegante, un sistema de rutas flexible y herramientas poderosas como Eloquent ORM y Blade templating.</p>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary">Saber más</button>
                </div>
            </div>
        </div>

        <!-- DaisyUI Card -->
        <div class="card glass w-full sm:w-96">
            <figure>
                <img src="img/daisy.webp" alt="DaisyUI" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">DaisyUI</h2>
                <p>DaisyUI es un conjunto de componentes de interfaz de usuario de código abierto para Tailwind CSS. Ofrece elementos estilizados como botones, formularios y alertas, listos para usar y personalizables.</p>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary">Saber más</button>
                </div>
            </div>
        </div>

        <!-- Breeze Card -->
        <div class="card glass w-full sm:w-96">
            <figure>
                <img src="img/breeze-register.png" alt="Breeze" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">Breeze</h2>
                <p>Breeze es un paquete de Laravel para gestionar la autenticación de manera rápida y sencilla. Ofrece una base de autenticación sencilla, utilizando Blade y Tailwind CSS para una integración sin complicaciones.</p>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary">Saber más</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Establecer la fecha objetivo: 14 de febrero de 2025 a las 00:00
        const targetDate = new Date("2025-02-15T00:00:00");

        function updateCountdown() {
            const now = new Date();
            const timeDifference = targetDate - now;

            if (timeDifference <= 0) {
                // Si el tiempo ha llegado a cero, detener la cuenta regresiva
                document.getElementById('days').textContent = "0";
                document.getElementById('hours').textContent = "0";
                document.getElementById('minutes').textContent = "0";
                document.getElementById('seconds').textContent = "0";
                return; // Salir de la función si ya llegó al objetivo
            }

            // Calcular días, horas, minutos y segundos
            const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

            // Actualizar los elementos HTML con los valores
            document.getElementById('days').textContent = days;
            document.getElementById('hours').textContent = hours;
            document.getElementById('minutes').textContent = minutes;
            document.getElementById('seconds').textContent = seconds;
        }

        // Llamar a la función `updateCountdown` cada segundo (1000 ms)
        setInterval(updateCountdown, 1000);
    </script>
</x-layouts.layout>

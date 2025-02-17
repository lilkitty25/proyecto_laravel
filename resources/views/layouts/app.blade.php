<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">

    <!-- Encabezado con logo y botones -->
    <header class="h-15v bg-header flex flex-row justify-between items-center p-3">
        <!-- Logo -->
        <img class="h-16 max-h-full bg-white" src="{{ asset('images/logo.png') }}" alt="logo">

        <!-- Título -->
        <h1 class="text-5xl text-white">GESTIÓN CENTRO</h1>

        <!-- Formulario de Login y Register -->
        <div>
            <form action="" class="flex gap-4">
                <!-- Botón Login con enlace -->
                @if (Route::has('login'))
                    <a href="{{ route('login') }}">
                        <button
                            type="button"
                            class="btn btn-sm btn-primary btn-outline hover:bg-primary hover:text-white transition-all duration-200">
                            Login
                        </button>
                    </a>
                @endif

                <!-- Botón Register con enlace -->
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">
                        <button
                            type="button"
                            class="btn btn-sm btn-accent hover:bg-accent hover:text-white transition-all duration-200">
                            Register
                        </button>
                    </a>
                @endif
            </form>
        </div>
    </header>

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
</body>
</html>

<header class="bg-gradient-to-r from-purple-500 to-pink-500 shadow-lg p-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="block h-12 md:h-16 rounded-full transition-all duration-300 transform hover:scale-105 hover:opacity-80">
            <img class="h-full w-auto rounded-full"
                 src="{{ asset('img/logo1.png') }}" alt="logo">
        </a>

        <!-- Título (visible solo en pantallas grandes) -->
        <h1 class="text-4xl font-semibold text-white hover:text-gray-300 transition-all duration-300 hidden md:block">
            Welcome to Kawaii<3
        </h1>

        <!-- Menú en dispositivos grandes -->
        <div class="hidden md:flex items-center space-x-4">
            @guest
                <div class="space-x-4">
                    <a href="{{ route('login') }}" class="btn btn-sm btn-primary hover:bg-primary-focus transition-all duration-300">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-sm btn-secondary hover:bg-secondary-focus transition-all duration-300">
                        Register
                    </a>
                </div>
            @endguest
            @auth
                <span class="text-white">{{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="post" class="inline">
                    @csrf
                    <input class="btn btn-sm btn-secondary hover:bg-secondary-focus transition-all duration-300" type="submit" value="Logout">
                </form>
            @endauth
        </div>

        <!-- Menú hamburguesa para dispositivos móviles -->
        <div class="md:hidden">
            <!-- Checkbox oculto para controlar la visibilidad del menú -->
            <input type="checkbox" id="menu-toggler" class="peer hidden">

            <!-- Ícono de hamburguesa -->
            <label for="menu-toggler" class="text-3xl cursor-pointer text-white">
                &#9778;
            </label>

            <!-- Menú desplegable para móviles -->
            <div class="hidden absolute bg-white right-0 p-4 rounded-xl peer-checked:flex flex-col space-y-2 shadow-lg w-48">
                @guest
                    <!-- Opciones para usuarios no autenticados -->
                    <form action="" class="flex flex-col space-y-2">
                        <a href="{{ route('login') }}" class="btn btn-sm btn-primary btn-outline text-white">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-sm btn-secondary text-white">Register</a>
                    </form>
                @endguest
                @auth
                    <!-- Nombre del usuario y opción de logout -->
                    <span class="text-black font-semibold">{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input class="btn btn-sm btn-secondary text-white" type="submit" value="Logout">
                    </form>
                @endauth

                <!-- Enlaces adicionales -->
                <a href="#about" class="text-black hover:text-gray-500">About</a>
                <a href="#services" class="text-black hover:text-gray-500">Services</a>
                <a href="#contact" class="text-black hover:text-gray-500">Contact</a>
            </div>
        </div>
    </div>

    <!-- Menú desplegable para móviles (para usuarios que no están autenticados) -->
    <div class="peer-checked:block hidden bg-gradient-to-r from-purple-500 to-pink-500 shadow-lg">
        <div class="flex flex-col items-center p-4 space-y-2">
            @guest
                <a href="{{ route('login') }}" class="btn btn-sm btn-primary w-full mb-2 hover:bg-primary-focus transition-all duration-300">
                    Login
                </a>
                <a href="{{ route('register') }}" class="btn btn-sm btn-secondary w-full mb-2 hover:bg-secondary-focus transition-all duration-300">
                    Register
                </a>
            @endguest
            @auth
                <span class="text-white">{{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="post" class="inline">
                    @csrf
                    <input class="btn btn-sm btn-secondary w-full mb-2 hover:bg-secondary-focus transition-all duration-300" type="submit" value="Logout">
                </form>
            @endauth
            <!-- Otros enlaces del menú -->
            <a href="#about" class="text-white mb-2 hover:text-gray-300 transition-all duration-300">About</a>
            <a href="#services" class="text-white mb-2 hover:text-gray-300 transition-all duration-300">Services</a>
            <a href="#contact" class="text-white mb-2 hover:text-gray-300 transition-all duration-300">Contact</a>
        </div>
    </div>
</header>

<header class="bg-gradient-to-r from-purple-500 to-pink-500 shadow-lg pt-4 pb-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between p-4">
        <!-- Logo -->
        <img class="h-12 md:h-16 rounded-full transition-all duration-300 transform hover:scale-105"
             src="{{ asset('img/logo1.png') }}" alt="logo">

        <!-- Título -->
        <h1 class="text-4xl font-semibold text-white hover:text-gray-300 transition-all duration-300 hidden md:block">
            Welcome to Kawaii<3
        </h1>

        <!-- Menú hamburguesa para móviles -->
        <div class="flex items-center md:hidden">
            <!-- Input checkbox para controlar el estado del menú -->
            <input type="checkbox" id="menu-toggle" class="hidden peer" />
            <label for="menu-toggle" class="cursor-pointer text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </label>
        </div>

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
    </div>

    <!-- Menú desplegable para móviles (se muestra cuando el checkbox está marcado) -->
    <div class="peer-checked:block hidden bg-gradient-to-r from-purple-500 to-pink-500 shadow-lg">
        <div class="flex flex-col items-center p-4">
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
        </div>
    </div>
</header>

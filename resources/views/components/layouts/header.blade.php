<header class="bg-gradient-to-r from-purple-500 to-pink-500 shadow-lg pt-4 pb-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between p-4">
        <!-- Logo -->
        <img class="h-12 md:h-16 rounded-full transition-all duration-300 transform hover:scale-105"
             src="{{ asset('img/logo1.png') }}" alt="logo">

        <!-- Título -->
        <h1 class="text-4xl font-semibold text-white hover:text-gray-300 transition-all duration-300">
            Welcome to Kawaii<3
        </h1>
@guest
        <!-- Botones de login y register -->
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
            {{auth()->user()->name}}
            <form action="{{route("logout")}}" method="post">
                @csrf
                <input  class="btn btn-sm btn-secondary hover:bg-secondary-focus transition-all duration-300" type="submit" value="logout">
            </form>
        @endauth
    </div>
</header>

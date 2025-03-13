@auth
    <nav class="h-10v bg-nav flex flex-row justify-center items-center px-4 gap-4 mt-4">
        <a href="{{ route('home') }}" class="btn btn-secondary">Home</a>
        <a href="{{ route('about') }}" class="btn btn-active btn-primary">About</a>
        <a href="{{ route('contact') }}" class="btn btn-neutral">Contact</a>
        <a href="{{ route('alumnos.index') }}" class="btn btn-primary">Alumnos</a>
        <a href="{{ route('news') }}" class="btn btn-active btn-accent">News</a>
    </nav>
@endauth

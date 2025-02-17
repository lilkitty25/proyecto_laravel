<x-layouts.layouts>
<form method="POST" action="{{ route('logout') }}">
    @csrf  <!-- Directiva Blade para el token CSRF -->
    <button type="submit">Cerrar sesión</button>
</form>
    </x-layouts.layouts>

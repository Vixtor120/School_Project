<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EduPro')</title>
    <link href="/css/app.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/logo2.png') }}" alt="Editar" href="{{ route('home') }}" class="w-9 h-9">
                <a class="text-gray-700 hover:text-blue-600" href="{{ route('home') }}">Inicio</a>
                <a class="text-gray-700 hover:text-blue-600" href="{{ route('projects.index') }}">Proyectos</a>
                <a class="text-gray-700 hover:text-blue-600" href="{{ route('projects.create') }}">Crear Proyecto</a>
                @if (auth()->check() && auth()->user()->role === 'admin' || auth()->check() && auth()->user()->role === 'student')
                <a class="text-gray-700 hover:text-blue-600" href="{{ route('profile.show') }}">Perfil</a>
                @endif
                @if (auth()->check() && auth()->user()->role === 'admin')
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Panel de Control</a>
                @endif
                @if (auth()->check() === false)
                <a class="text-gray-700 hover:text-blue-600" href="{{ route('login') }}">Iniciar Sesión</a>
                <a class="text-gray-700 hover:text-blue-600" href="{{ route('register') }}">Registrarse</a>
                @endif
            </div>
        </div>
    </nav>
    <div class="container mx-auto mt-8 px-4">
        @yield('content')
    </div>
</body>
</html>
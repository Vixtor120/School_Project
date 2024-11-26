@extends('layouts.layout')

@section('title', 'Inicio')

@section('content')
<div class="text-center">
    <h1 class="text-5xl font-extrabold mb-6 text-blue-600 animate-bounce transition duration-500 ease-in-out transform hover:scale-110">
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-600">
            ¡Bienvenido a la Plataforma Escolar!
        </span>
    </h1>
    <p class="text-lg mt-4">Nuestra plataforma es una herramienta para gestionar proyectos asignados a los usuarios. Facilita la organización y colaboración en el ámbito escolar.</p>
    <p class="text-lg mt-4">Puedes crear, ver, editar y eliminar proyectos de manera eficiente.</p>
</div>
<div class="flex justify-around mt-8">
    <div class="p-4 bg-blue-100 rounded-lg shadow-md text-center">
        <img src="{{ asset('images/editar.png') }}" alt="Editar" class="mx-auto mb-2 w-8 h-8">
        <h2 class="text-xl font-bold">Editar</h2>
        <p>Modifica la información existente en la plataforma.</p>
    </div>
    <div class="p-4 bg-blue-100 rounded-lg shadow-md text-center">
        <img src="{{ asset('images/crear.png') }}" alt="Crear" class="mx-auto mb-2 w-8 h-8">
        <h2 class="text-xl font-bold">Crear</h2>
        <p>Añade nueva información a la plataforma.</p>
    </div>
    <div class="p-4 bg-blue-100 rounded-lg shadow-md text-center">
        <img src="{{ asset('images/goma.png') }}" alt="Eliminar" class="mx-auto mb-2 w-8 h-8">
        <h2 class="text-xl font-bold">Eliminar</h2>
        <p>Elimina información que ya no es necesaria.</p>
    </div>
    <div class="p-4 bg-blue-100 rounded-lg shadow-md text-center">
        <img src="{{ asset('images/view.png') }}" alt="Ver" class="mx-auto mb-2 w-8 h-8">
        <h2 class="text-xl font-bold">Ver</h2>
        <p>Consulta la información disponible en la plataforma.</p>
    </div>
</div>
@endsection
@extends('layouts.layout') 
@section('title', 'Detalles del Proyecto') 
@section('content') 
 <h1 class="text-3xl font-bold mb-6 text-blue-600">{{ $project->name }}</h1>
 <p class="mb-4"><strong>Descripción:</strong> {{ $project->description }}</p>
 <p class="mb-4"><strong>Fecha Límite:</strong> {{ $project->deadline }}</p>
 <p class="mb-4"><strong>Usuario:</strong> {{ $project->user->name }}</p>
 <a href="{{ route('projects.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-300 ease-in-out transform hover:scale-105">Volver a la Lista</a>
@endsection
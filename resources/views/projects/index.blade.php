@extends('layouts.layout') 
@section('title', 'Lista de Proyectos') 
@section('content') 
 <h1 class="text-3xl font-bold mb-6 text-blue-600">Lista de Proyectos</h1>
 @if (session('success'))
 <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
 {{ session('success') }}
 </div>
 @endif
 <a href="{{ route('projects.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-6 inline-block">Crear Nuevo Proyecto</a>
 <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
 <thead class="bg-gray-200">
 <tr>
 <th class="py-3 px-4 text-left text-gray-600 font-bold">Nombre</th>
 <th class="py-3 px-4 text-left text-gray-600 font-bold">Descripción</th>
 <th class="py-3 px-4 text-left text-gray-600 font-bold">Fecha Límite</th>
 <th class="py-3 px-4 text-left text-gray-600 font-bold">Usuario</th>
 <th class="py-3 px-4 text-left text-gray-600 font-bold">Acciones</th>
 </tr>
 </thead>
 <tbody>
 @forelse ($projects as $project) 
 <tr class="border-b">
 <td class="py-3 px-4">{{ $project->name }}</td>
 <td class="py-3 px-4">{{ $project->description }}</td>
 <td class="py-3 px-4">{{ $project->deadline }}</td>
 <td class="py-3 px-4">{{ $project->user->name }}</td>
 <td class="py-3 px-4 space-y-2">
 <a href="{{ route('projects.show', $project) }}" class="block bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Ver</a>
 <a href="{{ route('projects.edit', $project) }}" class="block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Editar</a>
 <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline-block">
 @csrf
 @if (auth()->check() && auth()->user()->role === 'admin')
 @method('DELETE') 
 <button type="submit" class="block bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Eliminar</button>
@endif
 </form>
 </td>
 </tr>
 @empty
 <tr>
 <td colspan="5" class="text-center py-4 text-gray-600">No se encontraron proyectos.</td>
 </tr>
 @endforelse
 </tbody>
 </table>
@endsection
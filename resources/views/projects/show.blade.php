@extends('layouts.layout') 
@section('title', 'Project Details') 
@section('content') 
 <h1 class="text-3xl font-bold mb-6 text-blue-600">{{ $project->name }}</h1>
 <p class="mb-4"><strong>Description:</strong> {{ $project->description }}</p>
 <p class="mb-4"><strong>Deadline:</strong> {{ $project->deadline }}</p>
 <p class="mb-4"><strong>User:</strong> {{ $project->user->name }}</p>
 <a href="{{ route('projects.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-300 ease-in-out transform hover:scale-105">Back to List</a>
@endsection
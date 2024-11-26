@extends('layouts.layout') 
@section('title', 'Edit Project') 
@section('content') 
    <h1 class="text-3xl font-bold mb-6 text-blue-600">Edit Project</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error) 
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.update', $project) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
        <input type="text" class="form-control w-full px-3 py-2 border rounded-lg" id="name" name="name" value="{{ $project->name }}" required>
    </div>
    <div class="mb-4">
        <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
        <textarea class="form-control w-full px-3 py-2 border rounded-lg" id="description" name="description" required>{{ $project->description }}</textarea>
    </div>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Project</button>
</form>

@endsection

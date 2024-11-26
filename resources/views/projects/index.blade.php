@extends('layouts.layout') 
@section('title', 'Projects List') 
@section('content') 
 <h1 class="text-3xl font-bold mb-6 text-blue-600">Projects List</h1>
 @if (session('success'))
 <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
 {{ session('success') }}
 </div>
 @endif
 <a href="{{ route('projects.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-6 inline-block">Create New Project</a>
 <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
 <thead class="bg-gray-200">
 <tr>
 <th class="py-3 px-4 text-left text-gray-600 font-bold">Name</th>
 <th class="py-3 px-4 text-left text-gray-600 font-bold">Description</th>
 <th class="py-3 px-4 text-left text-gray-600 font-bold">Deadline</th>
 <th class="py-3 px-4 text-left text-gray-600 font-bold">User</th>
 <th class="py-3 px-4 text-left text-gray-600 font-bold">Actions</th>
 </tr>
 </thead>
 <tbody>
 @forelse ($projects as $project) 
 <tr class="border-b">
 <td class="py-3 px-4">{{ $project->name }}</td>
 <td class="py-3 px-4">{{ $project->description }}</td>
 <td class="py-3 px-4">{{ $project->deadline }}</td>
 <td class="py-3 px-4">{{ $project->user->name }}</td>
 <td class="py-3 px-4 space-x-2">
 <a href="{{ route('projects.show', $project) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">View</a>
 <a href="{{ route('projects.edit', $project) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a>
 <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline-block">
 @csrf
 @method('DELETE') 
 <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
 </form>
 </td>
 </tr>
 @empty
 <tr>
 <td colspan="5" class="text-center py-4 text-gray-600">No projects found.</td>
 </tr>
 @endforelse
 </tbody>
 </table>
@endsection
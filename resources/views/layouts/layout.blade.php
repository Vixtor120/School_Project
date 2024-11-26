<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'School Platform')</title>
    <link href="/css/app.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a class="text-2xl font-bold text-blue-600" href="{{ route('home') }}">School Platform</a>
            <div class="space-x-4">
                <a class="text-gray-700 hover:text-blue-600" href="{{ route('home') }}">Home</a>
                <a class="text-gray-700 hover:text-blue-600" href="{{ route('projects.index') }}">Projects</a>
                <a class="text-gray-700 hover:text-blue-600" href="{{ route('projects.create') }}">Create Project</a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto mt-8 px-4">
        @yield('content')
    </div>
</body>
</html>
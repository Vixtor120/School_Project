<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Auth\LoginController;

// Ruta de inicio, redirige a la vista home dentro de la carpeta home
Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('/', function () {
    // Handle the POST request
    return response()->json(['message' => 'POST request received']);
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/home', function () {
    return view('home.home');
})->name('home');

Route::get('/home', function () {
    return view('home.home');
})->name('home');

// Rutas del CRUD para Project
Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
    Route::resource('projects', ProjectController::class);
});

// Rutas del CRUD para Project para estudiantes
Route::middleware([RoleMiddleware::class . ':student'])->group(function () {
    Route::get('projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::post('projects', [ProjectController::class, 'store'])->name('projects.store'); // Allow students to create projects
    Route::get('projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::put('projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::get('projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

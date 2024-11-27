<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Auth;

// Ruta de inicio, redirige a la vista home dentro de la carpeta home
Route::get('/', function () {
    return view('home.home');
})->name('home')->middleware('auth');

// Rutas de autenticación
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function () {
    $credentials = request()->only('email', 'password');
    if (Auth::attempt($credentials)) {
        request()->session()->regenerate();
        return redirect()->intended('home');
    }
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
})->name('login.post');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function () {
    $validated = request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = \App\Models\User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);

    Auth::login($user);

    return redirect()->route('home');
})->name('register.post');

// Rutas del CRUD para Project para administradores
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
    Route::get('projects/create', [ProjectController::class, 'create'])->name('projects.create');
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

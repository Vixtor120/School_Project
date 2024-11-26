<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

// Ruta de inicio, redirige a la vista home dentro de la carpeta home
Route::get('/', function () {
    return view('home.home');
})->name('home');

// Rutas del CRUD para Project
Route::resource('projects', ProjectController::class);
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
Route::get('/welcome', function () {
 return view('welcome');
});
// Ruta de inicio, redirige a la lista de proyectos
Route::get('/', function () {
 return redirect()->route('projects.index');
});
// Rutas del CRUD para Project
Route::resource('projects', ProjectController::class);
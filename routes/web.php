<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//show all notes and  form
Route::get('/tareas', [TodosController::class, 'index'])->name('todos');

//name-> renombra la ruta, store
Route::post('/tareas', [TodosController::class, 'store'])->name('todos');

Route::get('/tareas/{id}', [TodosController::class, 'show'])->name('todos-show');
//edit
Route::patch('/tareas/{id}', [TodosController::class, 'update'])->name('todos-update');
//Route::post('/tareas/{id}', [TodosController::class, 'update'])->name('todos-update');

Route::delete('/tareas/{id}', [TodosController::class, 'destroy'])->name('todos-destroy');
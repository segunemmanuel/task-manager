<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('tasks/create',[\App\Http\Controllers\TaskController::class,'create'])->name('tasks.create');
Route::post('tasks/store',[\App\Http\Controllers\TaskController::class,'store'])->name('tasks.store');
Route::get('tasks/view',[\App\Http\Controllers\TaskController::class,'index'])->name('tasks.index');

Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::post('/tasks/reorder', [TaskController::class, 'reorder'])->name('tasks.reorder');

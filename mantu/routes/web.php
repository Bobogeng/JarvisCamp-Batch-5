<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');

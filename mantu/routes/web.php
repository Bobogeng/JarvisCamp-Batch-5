<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'index'])->name('admin');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');

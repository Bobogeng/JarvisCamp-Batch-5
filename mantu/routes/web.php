<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::middleware(['HandleUnsupportedRequests'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');
    Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');
    Route::match(['get', 'put'], '/tasks/update/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::get('/tasks-list', [TaskController::class, 'list'])->name('tasks.list');
    Route::get('/tasks-list/{id}', [TaskController::class, 'detail'])->name('tasks.list.show');
});

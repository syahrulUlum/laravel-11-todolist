<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoController::class, 'index']);
Route::resource('todo', TodoController::class, [
    'except' => ['create', 'show'],
]);

Route::put('todo/{todo}/done', [TodoController::class, 'done'])->name('todo.done');
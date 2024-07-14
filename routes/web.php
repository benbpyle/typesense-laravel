<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/todos", [TodoController::class, 'index']);
Route::get('/todos/new', [TodoController::class, 'newTodo']);
Route::post('/todos/save', [TodoController::class, 'store']);
Route::post('/todos/search', [TodoController::class, 'search']);

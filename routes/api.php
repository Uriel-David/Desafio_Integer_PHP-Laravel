<?php

use App\Http\Controllers\ToDoController;
use Illuminate\Support\Facades\Route;

Route::get('/todos', [ToDoController::class, 'listAll']);
Route::post('/todos', [ToDoController::class, 'createToDo']);
Route::put('/todos/{id}', [ToDoController::class, 'updateToDo']);
Route::delete('/todos/{id}', [ToDoController::class, 'deleteToDo']);

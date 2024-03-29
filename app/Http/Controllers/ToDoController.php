<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToDoCreateRequest;
use App\Http\Requests\ToDoUpdateRequest;
use App\Http\Resources\ToDoResource;
use App\Http\Services\ToDoService;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    private ToDoService $toDoService;

    public function __construct(ToDoService $toDoService) {
        $this->toDoService = $toDoService;
    }

    public function listAll(Request $request): ToDoResource
    {
        $todos = $this->toDoService->listAll();
        return $todos;
    }

    public function createToDo(ToDoCreateRequest $request): ToDoResource
    {
        $todo = $request->validated();
        $todo = $this->toDoService->createToDo($todo);
        return $todo;
    }

    public function updateToDo(ToDoUpdateRequest $request, int $id): ToDoResource
    {
        $todo = $request->validated();
        $todo = $this->toDoService->updateToDo($todo, $id);
        return $todo;
    }

    public function deleteToDo(Request $request, int $id): ToDoResource
    {
        $todo = $this->toDoService->deleteToDo($id);
        return $todo;
    }
}

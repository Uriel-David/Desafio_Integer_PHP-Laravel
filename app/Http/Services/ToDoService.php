<?php

namespace App\Http\Services;
use App\Http\Resources\ToDoResource;
use App\Models\ToDo;

class ToDoService
{
    public function __construct() {}

    public function listAll(): ToDoResource
    {
        $todos = ToDo::all();
        return new ToDoResource($todos);
    }

    public function createToDo($todo): ToDoResource
    {
        $todo = ToDo::create($todo);
        return new ToDoResource($todo);
    }

    public function updateToDo($todo, $id): ToDoResource
    {
        $todo = ToDo::find($id)->update($todo);
        $updatedToDo = ToDo::find($id);
        return new ToDoResource($updatedToDo);
    }

    public function deleteToDo($id): ToDoResource
    {
        $todo = ToDo::query()->find($id);
        $todo->delete();
        return new ToDoResource($todo);
    }
}

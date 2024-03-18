<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\ToDoController;
use App\Http\Requests\ToDoCreateRequest;
use App\Http\Requests\ToDoUpdateRequest;
use App\Http\Resources\ToDoResource;
use App\Models\ToDo;
use App\Http\Services\ToDoService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;
use Mockery;

class ToDoUnitTest extends TestCase
{
    use RefreshDatabase;

    protected ToDoService $toDoService;
    protected $controller;

    public function setUp(): void
    {
        parent::setUp();
        $this->toDoService = Mockery::mock(ToDoService::class);
        $this->controller = new ToDoController($this->toDoService);
    }

    public function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    public function testListAll()
    {
        $todos = ToDo::factory()->create();
        $this->toDoService->shouldReceive('listAll')->andReturn(new ToDoResource($todos));
        $response = $this->controller->listAll(new Request());

        $this->assertInstanceOf(ToDoResource::class, $response);
    }

    public function testCreateToDo()
    {
        $todoData = [
            'title' => 'Test Title',
            'description' => 'Test Description',
            'is_checked' => true
        ];
        $request = $this->getMockBuilder(ToDoCreateRequest::class)
            ->disableOriginalConstructor()
            ->getMock();
        $request->expects($this->once())
            ->method('validated')
            ->willReturn($todoData);

        $this->toDoService->shouldReceive('createToDo')->with($todoData)->andReturn(new ToDoResource($todoData));
        $response = $this->controller->createToDo($request);

        $this->assertInstanceOf(ToDoResource::class, $response);
    }

    public function testUpdateToDo()
    {
        $todoId = 1;
        $updatedData = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'is_checked' => false
        ];
        $request = $this->getMockBuilder(ToDoUpdateRequest::class)
            ->disableOriginalConstructor()
            ->getMock();
        $request->expects($this->once())
            ->method('validated')
            ->willReturn($updatedData);

        $this->toDoService->shouldReceive('updateToDo')->with($updatedData, $todoId)->andReturn(new ToDoResource($updatedData));
        $response = $this->controller->updateToDo($request, $todoId);

        $this->assertInstanceOf(ToDoResource::class, $response);
    }

    public function testDeleteToDo()
    {
        $todoId = 1;

        $this->toDoService->shouldReceive('deleteToDo')->with($todoId)->andReturn(new ToDoResource([]));
        $response = $this->controller->deleteToDo(new Request(), $todoId);

        $this->assertInstanceOf(ToDoResource::class, $response);
    }
}

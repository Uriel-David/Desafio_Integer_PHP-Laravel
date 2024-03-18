<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\ToDo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

class ToDoIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function testListAll()
    {
        $this->seed();
        $response = $this->get('/api/todos');
        $responseData = $response->json();

        $response->assertStatus(Response::HTTP_OK);
        $this->assertArrayHasKey('id', $responseData['data'][0]);
        $this->assertArrayHasKey('title', $responseData['data'][0]);
        $this->assertArrayHasKey('description', $responseData['data'][0]);
        $this->assertArrayHasKey('is_checked', $responseData['data'][0]);
        $response->assertJsonCount(1);
    }

    public function testCreateToDo()
    {
        $todoData = [
            'title' => 'Test Title',
            'description' => 'Test Description',
            'is_checked' => true
        ];

        $response = $this->post('/api/todos', $todoData);
        $response->assertStatus(Response::HTTP_CREATED)
            ->assertJsonFragment($todoData);
    }

    public function testUpdateToDo()
    {
        $this->seed();
        $todo = ToDo::first();
        $updatedData = [
            'title' => 'Test Title',
            'description' => 'Test Description',
            'is_checked' => true
        ];

        $response = $this->put("/api/todos/{$todo->id}", $updatedData);
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonFragment($updatedData);
    }

    public function testDeleteToDo()
    {
        $this->seed();
        $todo = ToDo::first();
        $response = $this->delete("/api/todos/{$todo->id}");
        $responseData = $response->json();

        $response->assertStatus(Response::HTTP_OK);
        $this->assertArrayHasKey('id', $responseData['data']);
        $this->assertArrayHasKey('title', $responseData['data']);
        $this->assertArrayHasKey('description', $responseData['data']);
        $this->assertArrayHasKey('is_checked', $responseData['data']);
        $response->assertJsonCount(1);
    }
}

<?php

namespace Tests\Unit;

use App\Models\Tasks as Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class TodoListTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    use RefreshDatabase;

    public function test_example(): void
    {
        $this->assertTrue(true);
    }


    // Unit Test for todos
    public function testTaskCanBeCreated()
    {
        $taskData = [
            'title' => 'Test Task',
            'description' => 'This is a test task',
        ];

        $task = Task::create($taskData);

        $this->assertInstanceOf(Tasks::class, $task);
        $this->assertEquals($taskData['title'], $task->title);
        $this->assertEquals($taskData['description'], $task->description);
    }
}

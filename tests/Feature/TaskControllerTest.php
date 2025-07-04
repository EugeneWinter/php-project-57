<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Task;

/**
 * @property Task $task
 */
class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    /**
     * @var Task
     */
    private $task;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        /** @var Task $task */
        $task = Task::factory()->create();
        $this->task = $task;
    }

    public function testIndex(): void
    {
        $response = $this->get(route('tasks.index'));
        $response->assertOk();
    }

    public function testCreate(): void
    {
        $this->actingAs($this->user);
        $response = $this->get(route('tasks.create'));
        $response->assertOk();
    }

    public function testStore(): void
    {
        $this->actingAs($this->user);
        $body = Task::factory()->make()->only('name', 'status_id');
        $response = $this->post(route('tasks.store', $body));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('tasks', $body);
    }

    public function testShow(): void
    {
        $response = $this->get(route('tasks.show', $this->task));
        $response->assertOk();
    }

    public function testEdit(): void
    {
        $this->actingAs($this->user);
        $response = $this->get(route('tasks.edit', $this->task));
        $response->assertOk();
    }

    public function testUpdate(): void
    {
        $this->actingAs($this->user);
        $body = Task::factory()->make()->only('name', 'status_id');
        $response = $this->patch(route('tasks.update', $this->task), $body);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('tasks', [
            'id' => $this->task->getKey(),
            'name' => $body['name'],
            'status_id' => $body['status_id']
        ]);
    }

    public function testDestroy(): void
    {
        $this->actingAs($this->user);
        $ownTask = Task::factory()->for($this->user, 'createdBy')->create();
        $response = $this->delete(route('tasks.destroy', $ownTask));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('tasks', ['id' => $ownTask->getKey()]);
    }
}

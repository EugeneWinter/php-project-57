<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\TaskStatus;

class TaskStatusControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private TaskStatus $taskStatus;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->taskStatus = TaskStatus::factory()->create();
    }

    public function testIndex(): void
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertOk();
    }

    public function testCreate(): void
    {
        $this->actingAs($this->user);
        $response = $this->get(route('task_statuses.create'));
        $response->assertOk();
    }

    public function testStore(): void
    {
        $this->actingAs($this->user);
        $body = TaskStatus::factory()->make()->toArray();
        $response = $this->post(route('task_statuses.store'), $body);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('task_statuses', ['name' => $body['name']]);
    }

    public function testEdit(): void
    {
        $this->actingAs($this->user);
        $response = $this->get(route('task_statuses.edit', $this->taskStatus));
        $response->assertOk();
    }

    public function testUpdate(): void
    {
        $this->actingAs($this->user);
        $body = TaskStatus::factory()->make()->toArray();
        $response = $this->patch(route('task_statuses.update', $this->taskStatus), $body);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('task_statuses', [
            'id' => $this->taskStatus->id,
            'name' => $body['name']
        ]);
    }

    public function testDestroy(): void
    {
        $this->actingAs($this->user);
        $response = $this->delete(route('task_statuses.destroy', $this->taskStatus));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseMissing('task_statuses', ['id' => $this->taskStatus->id]);
    }
}

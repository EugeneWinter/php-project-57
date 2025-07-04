<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\TaskStatus;

class TaskStatusControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    /**
     * @var TaskStatus
     */
    private $taskStatus;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        /** @var TaskStatus $taskStatus */
        $taskStatus = TaskStatus::factory()->create();
        $this->taskStatus = $taskStatus;
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
        $body = TaskStatus::factory()->make()->only('name');
        $response = $this->post(route('task_statuses.store', $body));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('task_statuses', $body);
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
        $body = TaskStatus::factory()->make()->only('name');
        $response = $this->patch(route('task_statuses.update', $this->taskStatus), $body);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('task_statuses', [
            'id' => $this->taskStatus->getKey(),
            'name' => $body['name']
        ]);
    }

    public function testDestroy(): void
    {
        $this->actingAs($this->user);
        $response = $this->delete(route('task_statuses.destroy', $this->taskStatus));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseMissing('task_statuses', ['id' => $this->taskStatus->getKey()]);
    }
}

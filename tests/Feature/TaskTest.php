<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    public function test_index_displays_tasks(): void
    {
        Task::factory()->count(5)->create();

        $response = $this->get(route('tasks.index'));

        $response->assertOk()
            ->assertViewHas('tasks')
            ->assertSeeInOrder(Task::pluck('name')->all());
    }

    public function test_user_can_create_task(): void
    {
        $status = TaskStatus::factory()->create();
        $data = [
            'name' => 'Test Task',
            'status_id' => $status->id,
        ];

        $this->post(route('tasks.store'), $data)
            ->assertRedirect(route('tasks.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('tasks', $data);
    }

    public function test_creator_can_delete_task(): void
    {
        $task = Task::factory()->create(['created_by_id' => $this->user->id]);

        $this->delete(route('tasks.destroy', $task))
            ->assertRedirect(route('tasks.index'))
            ->assertSessionHas('success');

        $this->assertModelMissing($task);
    }

    public function test_non_creator_cannot_delete_task(): void
    {
        $otherUser = User::factory()->create();
        $task = Task::factory()->create(['created_by_id' => $otherUser->id]);

        $this->delete(route('tasks.destroy', $task))
            ->assertForbidden();

        $this->assertModelExists($task);
    }
}

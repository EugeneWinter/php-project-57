<?php

namespace App\Policies;

use App\Models\TaskStatus;
use App\Models\User;

class TaskStatusPolicy
{
    public function delete(User $user, TaskStatus $taskStatus): bool
    {
        return !$taskStatus->tasks()->exists();
    }
}
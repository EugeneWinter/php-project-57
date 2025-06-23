<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::with('status', 'createdBy', 'assignedTo')
            ->latest()
            ->paginate(15);

        return view('tasks.index', [
            'tasks' => $tasks,
            'users' => User::pluck('name', 'id'),
            'statuses' => TaskStatus::pluck('name', 'id')
        ]);
    }

    public function create(): View
    {
        return view('tasks.create', [
            'task' => new Task(),
            'users' => User::pluck('name', 'id'),
            'statuses' => TaskStatus::pluck('name', 'id')
        ]);
    }

    public function store(TaskRequest $request): RedirectResponse
    {
        Task::create($request->validated() + [
            'created_by_id' => auth()->id()
        ]);

        return redirect()->route('tasks.index')
            ->with('success', __('app.flash.task.created'));
    }

    public function show(Task $task): View
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task): View
    {
        return view('tasks.edit', [
            'task' => $task,
            'users' => User::pluck('name', 'id'),
            'statuses' => TaskStatus::pluck('name', 'id')
        ]);
    }

    public function update(TaskRequest $request, Task $task): RedirectResponse
    {
        $task->update($request->validated());

        return redirect()->route('tasks.index')
            ->with('success', __('app.flash.task.updated'));
    }

    public function destroy(Task $task): RedirectResponse
    {
        $this->authorize('delete', $task);
        
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', __('app.flash.task.deleted'));
    }
}
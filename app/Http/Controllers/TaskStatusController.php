<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStatusRequest;
use App\Models\TaskStatus;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskStatusController extends Controller
{
    public function index(): View
    {
        $taskStatuses = TaskStatus::withCount('tasks')->latest()->paginate(10);
        return view('statuses.index', compact('taskStatuses'));
    }

    public function create(): View
    {
        return view('statuses.create', [
            'taskStatus' => new TaskStatus()
        ]);
    }

    public function store(TaskStatusRequest $request): RedirectResponse
    {
        TaskStatus::create($request->validated());

        return redirect()->route('task_statuses.index')
            ->with('success', __('app.flash.status.created'));
    }

    public function edit(TaskStatus $taskStatus): View
    {
        return view('statuses.edit', compact('taskStatus'));
    }

    public function update(TaskStatusRequest $request, TaskStatus $taskStatus): RedirectResponse
    {
        $taskStatus->update($request->validated());

        return redirect()->route('task_statuses.index')
            ->with('success', __('app.flash.status.updated'));
    }

    public function destroy(TaskStatus $taskStatus): RedirectResponse
    {
        if ($taskStatus->tasks()->exists()) {
            return back()
                ->with('error', __('app.flash.status.deleteFailed'));
        }

        $taskStatus->delete();

        return redirect()->route('task_statuses.index')
            ->with('success', __('app.flash.status.deleted'));
    }
}

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
        $labels = TaskStatus::withCount('tasks')->latest()->paginate(10);
        return view('pages.labels', compact('labels'));
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

        return redirect()->route('labels.index')
            ->with('success', __('app.flash.status.created'));
    }

    public function edit(TaskStatus $taskStatus): View
    {
        return view('statuses.edit', compact('taskStatus'));
    }

    public function update(TaskStatusRequest $request, TaskStatus $taskStatus): RedirectResponse
    {
        $taskStatus->update($request->validated());

        return redirect()->route('labels.index')
            ->with('success', __('app.flash.status.updated'));
    }

    public function destroy(TaskStatus $taskStatus): RedirectResponse
    {
        if ($taskStatus->tasks()->exists()) {
            return back()
                ->with('error', __('app.flash.status.deleteFailed'));
        }

        $taskStatus->delete();

        return redirect()->route('labels.index')
            ->with('success', __('app.flash.status.deleted'));
    }
}

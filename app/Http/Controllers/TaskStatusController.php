<?php

namespace App\Http\Controllers;

use App\Models\TaskStatus;
use App\Http\Requests\TaskStatusRequest;

class TaskStatusController extends Controller
{
    public function index()
    {
        $statuses = TaskStatus::paginate(10);
        return view('task_statuses.index', compact('statuses'));
    }

    public function create()
    {
        return view('task_statuses.create');
    }

    public function store(TaskStatusRequest $request)
    {
        TaskStatus::create($request->validated());
        return redirect()->route('task_statuses.index')->with('success', 'Статус успешно создан');
    }

    public function edit(TaskStatus $taskStatus)
    {
        return view('task_statuses.edit', compact('taskStatus'));
    }

    public function update(TaskStatusRequest $request, TaskStatus $taskStatus)
    {
        $taskStatus->update($request->validated());
        return redirect()->route('task_statuses.index')->with('success', 'Статус успешно изменён');
    }

    public function destroy(TaskStatus $taskStatus)
    {
        $taskStatus->delete();
        return redirect()->route('task_statuses.index')->with('success', 'Статус успешно удалён');
    }
}

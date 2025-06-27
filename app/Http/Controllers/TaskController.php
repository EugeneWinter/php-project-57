<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['status', 'createdBy', 'assignedTo'])->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {
        $task = Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'status_id' => $request->status_id,
            'created_by_id' => auth()->id(),
            'assigned_to_id' => $request->assigned_to_id
        ]);

        return redirect()->route('tasks.index')->with('success', 'Задача успешно создана');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update([
            'name' => $request->name,
            'description' => $request->description,
            'status_id' => $request->status_id,
            'assigned_to_id' => $request->assigned_to_id
        ]);

        return redirect()->route('tasks.index')->with('success', 'Задача успешно изменена');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Задача успешно удалена');
    }
}

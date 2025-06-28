<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskStatusRequest;
use App\Models\TaskStatus;

class TaskStatusController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->authorizeResource(TaskStatus::class, 'task_status');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taskStatuses = TaskStatus::orderBy('id')->paginate();
        return view('task_status.index', compact('taskStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$taskStatuses = new TaskStatus();
        //print_r(session()->all());
        return view('task_status.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStatusRequest $request)
    {
        $data = $request->validated();
        $taskStatus = new TaskStatus($data);
        $taskStatus->save();

        flash(__('flash.task_statuses.store.success'))->success();

        return redirect()->route('task_statuses.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskStatus $taskStatus)
    {
        return view('task_status.edit', compact('taskStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskStatusRequest $request, TaskStatus $taskStatus)
    {
        $data = $request->validated();
        $taskStatus->fill($data);
        $taskStatus->save();

        flash(__('flash.task_statuses.update.success'))->success();

        return redirect()->route('task_statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskStatus $taskStatus)
    {
        if ($taskStatus->tasks()->exists()) {
            flash(__('flash.task_statuses.delete.error'))->error();
            return back();
        }

        $taskStatus->delete();
        flash(__('flash.task_statuses.delete.success'))->success();

        return redirect()->route('task_statuses.index');
    }
}

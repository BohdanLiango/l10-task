<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Services\TaskService;

class TaskController extends Controller
{
    public TaskService $taskService;
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = $this->taskService->showAllTasks( 10);
        return view('index', compact('tasks'));
    }

    public function show($id)
    {
        $task = $this->taskService->findORFailTaskbyId($id);
        return view('show', compact('task'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(TaskRequest $request)
    {
        $id = $this->taskService->storeOrUpdateTask($request, NULL);
        return redirect()->route('tasks.show', compact('id'))
            ->with('success', 'Task created successfully!');
    }

    public function edit($id)
    {
        $task = $this->taskService->findORFailTaskbyId($id);
        return view('edit', compact('task'));
    }

    public function update(TaskRequest $request, $id)
    {
        $this->taskService->storeOrUpdateTask($request, $id);

        return redirect()->route('tasks.show', compact('id'))
            ->with('success', 'Task updated successfully!');
    }

    public function complete($id)
    {
        $this->taskService->completeTask($id);
        return redirect()->back()->with('success', 'Task updated successfully!');
    }
    public function delete($id)
    {
        $this->taskService->deleteTask($id);
        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully!');
    }
}

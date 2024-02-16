<?php

namespace App\Http\Services;

use App\Models\Task;

class TaskService
{
    public function showAllTasks($paginate)
    {
        return Task::latest()->paginate($paginate);
    }

    public function findORFailTaskbyId($id)
    {
        return Task::findOrFail($id);
    }

    public function storeOrUpdateTask($request, $id)
    {
        $data = $request->validated();
        if ($id === NULL) {
            $task = new Task();
        } else {
            $task = $this->findORFailTaskbyId($id);
        }

        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->long_description = $data['long_description'];
        $task->save();

        return $task->id;
    }

    public function completeTask($id)
    {
        $task = $this->findORFailTaskbyId($id);
        $task->completed = !$task->completed;
        $task->save();
    }

    public function deleteTask($id)
    {
        return $this->findORFailTaskbyId($id)->delete();
    }
}

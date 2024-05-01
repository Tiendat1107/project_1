<?php

namespace App\Repositories\Task;

use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    public function getAll()
    {
        return Task::with('project','person')->get();

    }

    public function getById($id)
    {
        return Task::with('project','person')->findOrFail($id);
    }

    public function create(array $data)
    {
        $task = Task::create($data);
        return $task;
    }
    
    public function update($id, array $data)
    {
        $task = Task::findOrFail($id);
        $task->update($data);
        return $task;
    }

    public function delete($id)
    {
        return Task::destroy($id);
    }
    
}

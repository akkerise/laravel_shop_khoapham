<?php namespace App\Repositories\Task;

use App\Task;

class EloquentTaskRepository implements TaskRepository
{
    
    public function getAll()
    {
        return Task::all();
    }
}

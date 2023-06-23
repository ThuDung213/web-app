<?php

namespace App\Repositories\Task;

use App\Models\Task;
use App\Repositories\BaseRepositories;

class TaskRepository extends BaseRepositories implements TaskRepositoryInterface
{
    public function getModel()
    {
        return Task::class;
    }

    public function getTaskByProject($creator, $project)
    {
        $tasks = $this->model->whereHas('creators', function ($query) use ($creator) {
            $query->where('creator_id', $creator);
        })->where('project_id', $project)->get();
        return $tasks;
    }
}

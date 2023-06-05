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
}

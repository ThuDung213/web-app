<?php

namespace App\Service\Task;

use App\Repositories\Task\TaskRepositoryInterface;
use App\Service\BaseService;

class TaskService extends BaseService implements TaskServiceInterface
{
    public $repository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->repository = $taskRepository;
    }
}

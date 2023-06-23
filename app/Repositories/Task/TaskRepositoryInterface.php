<?php

namespace App\Repositories\Task;
use App\Repositories\RepositoriesInterface;

interface TaskRepositoryInterface extends RepositoriesInterface
{
    public function getTaskByProject($creator, $project);
}

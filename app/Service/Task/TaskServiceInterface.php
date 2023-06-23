<?php

namespace App\Service\Task;
use App\Service\ServiceInterface;

interface TaskServiceInterface extends ServiceInterface
{
    public function getTaskByProject($creator, $project);
}

<?php

namespace App\Repositories\Time;
use App\Repositories\RepositoriesInterface;

interface TimeRepositoryInterface extends RepositoriesInterface
{
    public function getTimeByProject($creator, $project);
    public function getTotalWorkingTime($creator, $project);
    public function getTimeByDay($creator, $project);
}

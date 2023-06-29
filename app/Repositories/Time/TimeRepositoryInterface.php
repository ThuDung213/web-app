<?php

namespace App\Repositories\Time;
use App\Repositories\RepositoriesInterface;

interface TimeRepositoryInterface extends RepositoriesInterface
{
    public function getTimeByProject($creator, $project);
    public function getTotalWorkingTime($creator, $project, $month, $year);
    public function getTimeByDay($creator, $project);
}

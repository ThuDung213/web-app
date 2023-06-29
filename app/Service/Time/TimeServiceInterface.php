<?php

namespace App\Service\Time;
use App\Service\ServiceInterface;

interface TimeServiceInterface extends ServiceInterface
{
    public function getTimeByProject($creator, $project);

    public function getTotalWorkingTime($creator, $project, $month, $year);

    public function getTimeByDay($creator, $project);
}

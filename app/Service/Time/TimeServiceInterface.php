<?php

namespace App\Service\Time;
use App\Service\ServiceInterface;

interface TimeServiceInterface extends ServiceInterface
{
    public function getTimeByProject($creator, $project);

    public function getTotalWorkingTime($creator, $project);

    public function getTimeByDay($creator, $project);
}

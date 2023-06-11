<?php

namespace App\Service\Time;
use App\Service\ServiceInterface;

interface TimeServiceInterface extends ServiceInterface
{
    public function getTimeByProject($creator, $project);
}

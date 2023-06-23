<?php

namespace App\Service\Time;

use App\Repositories\Time\TimeRepositoryInterface;
use App\Service\BaseService;

class TimeService extends BaseService implements TimeServiceInterface
{

    public $repository;

    public function __construct(TimeRepositoryInterface $timeRepository)
    {
        $this->repository = $timeRepository;
    }

    public function getTimeByProject($creator, $project)
    {
        return $this->repository->getTimeByProject($creator, $project);
    }

    public function getTotalWorkingTime($creator, $project)
    {
        return $this->repository->getTotalWorkingTime($creator, $project);
    }

    public function getTimeByDay($creator, $project)
    {
        return $this->repository->getTimeByDay($creator, $project);
    }
}

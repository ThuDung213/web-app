<?php

namespace App\Repositories\Time;

use App\Models\WorkingTime;
use App\Repositories\BaseRepositories;

class TimeRepository extends BaseRepositories implements TimeRepositoryInterface
{
    public function getModel()
    {
        return WorkingTime::class;
    }
    public function getTimeByProject($creator, $project)
    {
        $time = $this->model->where('creator_id', $creator)
            ->where('project_id', $project)
            ->get();
        return $time;
    }
}

<?php

namespace App\Repositories\Project;

use App\Models\Project;
use App\Repositories\BaseRepositories;

class ProjectRepository extends BaseRepositories implements ProjectRepositoryInterface
{
    public function getModel()
    {
        return Project::class;
    }
    public function getRelatedProjects($request)
    {
        return ;
    }
}

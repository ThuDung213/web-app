<?php

namespace App\Repositories\Project;
use App\Repositories\RepositoriesInterface;

interface ProjectRepositoryInterface extends RepositoriesInterface
{
    public function getRelatedProjects($request);
}

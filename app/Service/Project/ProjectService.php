<?php

namespace App\Service\Project;

use App\Repositories\Project\ProjectRepositoryInterface;
use App\Service\BaseService;

class ProjectService extends BaseService implements ProjectServiceInterface
{

    public $repository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->repository = $projectRepository;
    }
    public function getRelatedProjects($request)
    {
        return $this->repository->getRelatedProjects($request);
    }
}

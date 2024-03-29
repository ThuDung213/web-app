<?php

namespace App\Service\Project;
use App\Service\ServiceInterface;

interface ProjectServiceInterface extends ServiceInterface
{
    public function getRelatedProjects($creator);
    public function getProjectsByClient($client);
}

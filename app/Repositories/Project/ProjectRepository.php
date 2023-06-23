<?php

namespace App\Repositories\Project;

use App\Models\Project;
use App\Models\User;
use App\Repositories\BaseRepositories;

class ProjectRepository extends BaseRepositories implements ProjectRepositoryInterface
{
    public function getModel()
    {
        return Project::class;
    }
    //Get project by creator
    public function getRelatedProjects($creator)
    {
        // Find the user by ID
        $creator = User::find($creator);

        // Check if the user exists
        if (!$creator) {
            // Handle the case when the user is not found
            return response()->json(['error' => 'User not found'], 404);
        }
        // Retrieve the projects for the creator
        $projects = $creator->projects()->get();
        return $projects;
    }

    public function getProjectsByClient($client)
    {
        $projects = $this->model->where('client_id', $client)->get();
        return $projects;
    }
}

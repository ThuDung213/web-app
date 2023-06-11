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
    public function getRelatedProjects($creator)
    {
        // Find the user by ID
        $creator = User::find($creator);

        // Check if the user exists
        if (!$creator) {
            // Handle the case when the user is not found
            return response()->json(['error' => 'User not found'], 404);
        }
        // Retrieve the tasks for the user
        $tasks = $creator->Task()->get();

        // Retrieve the related projects from the tasks
        $projects = $tasks->map(function ($task) {
            return $task->Project;
        })->unique('id');
        return $projects;
    }
}

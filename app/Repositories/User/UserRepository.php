<?php

namespace App\Repositories\User;

use App\Models\Project;
use App\Models\User;
use App\Repositories\BaseRepositories;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepositories implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function getUserById()
    {
        $user = Auth::user()->id;
        return $user;
    }

    public function getUserByRole($role, $request)
    {
        $users = $this->model->where('role', $role)->get();
        return $users;
    }
    public function getCreatorsByProject($id)
    {
        $project = Project::find($id);
        $creators = $project->Task()->get()->map(function ($task) {
            return $task->creators;
        })->unique('id');
        return $creators;
    }
}

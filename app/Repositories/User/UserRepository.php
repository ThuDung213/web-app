<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepositories;

class UserRepository extends BaseRepositories implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function getUserByRole($role, $request)
    {
        $users = $this->model->where('role', $role)->get();
        return $users;
    }
}

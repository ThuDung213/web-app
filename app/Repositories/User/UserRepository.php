<?php

namespace App\Repositories\User;

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
}

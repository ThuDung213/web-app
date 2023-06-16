<?php

namespace App\Repositories\User;
use App\Repositories\RepositoriesInterface;

interface UserRepositoryInterface extends RepositoriesInterface
{
    public function getUserById();
    public function getUserByRole($role, $request);
    public function getCreatorsByProject($id);
}

<?php

namespace App\Service\User;
use App\Service\ServiceInterface;

interface UserServiceInterface extends ServiceInterface
{
    public function getUserById();
    public function getUserByRole($role, $request);
}

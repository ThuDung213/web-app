<?php

namespace App\Service\User;
use App\Service\ServiceInterface;

interface UserServiceInterface extends ServiceInterface
{
    public function getUserById($id);
    public function getUserByRole($role, $request);
    public function getCreatorsByProject($id);
    public function getAllExceptUser($id);
}

<?php

namespace App\Service\User;

use App\Repositories\User\UserRepositoryInterface;
use App\Service\BaseService;

class UserService extends BaseService implements UserServiceInterface
{

    public $repository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->repository = $userRepository;
    }
    public function getUserById($id)
    {
        return $this->repository->getUserById($id);
    }
    public function getUserByRole($role, $request)
    {
        return $this->repository->getUserByRole($role, $request);
    }

    public function getCreatorsByProject($id)
    {
        return $this->repository->getCreatorsByProject($id);
    }

    public function getAllExceptUser($id)
    {
        return $this->repository->getAllExceptUser($id);
    }
    public function getMessages($id)
    {
        return $this->repository->getMessages($id);
    }
}

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
    public function getUserById()
    {
        $this->repository->getUserById();
    }
    public function getUserByRole($role, $request)
    {
        return $this->repository->getUserByRole($role, $request);
    }

    public function getCreatorsByProject($id)
    {
        return $this->repository->getCreatorsByProject($id);
    }
}

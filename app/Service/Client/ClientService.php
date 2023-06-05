<?php

namespace App\Service\Client;

use App\Repositories\Client\ClientRepositoryInterface;
use App\Service\BaseService;

class ClientService extends BaseService implements ClientServiceInterface
{

    public $repository;

    public function __construct(ClientRepositoryInterface $projectRepository)
    {
        $this->repository = $projectRepository;
    }
}

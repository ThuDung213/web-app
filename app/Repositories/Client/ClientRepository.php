<?php

namespace App\Repositories\Client;

use App\Models\Client;
use App\Repositories\BaseRepositories;

class ClientRepository extends BaseRepositories implements ClientRepositoryInterface
{
    public function getModel()
    {
        return Client::class;
    }
}

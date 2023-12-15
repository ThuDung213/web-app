<?php

namespace App\Repositories\Message;
use App\Repositories\RepositoriesInterface;

interface MessageRepositoryInterface extends RepositoriesInterface
{
    public function getMessageByUser($id);
}

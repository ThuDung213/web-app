<?php

namespace App\Service\Message;

use App\Repositories\Message\MessageRepositoryInterface;
use App\Service\BaseService;

class MessageService extends BaseService implements MessageServiceInterface
{
    public $repository;
    public function __construct(MessageRepositoryInterface $messageRepository)
    {
        $this->repository = $messageRepository;
    }
    public function getMessageByUser($id)
    {
        $this->repository->getMessageByUser($id);
    }
}

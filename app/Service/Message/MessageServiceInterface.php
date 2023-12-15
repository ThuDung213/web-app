<?php

namespace App\Service\Message;
use App\Service\ServiceInterface;

interface MessageServiceInterface extends ServiceInterface
{
    public function getMessageByUser($id);
}

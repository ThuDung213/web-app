<?php

namespace App\Repositories\Message;

use App\Models\Message;
use App\Models\User;
use App\Repositories\BaseRepositories;

class MessageRepository extends BaseRepositories implements MessageRepositoryInterface
{
    public function getModel()
    {
        return Message::class;
    }
    public function getMessageByUser($id)
    {
        $user = User::find($id);
        $messages = $user->message()->get();
        return $messages;
    }
}

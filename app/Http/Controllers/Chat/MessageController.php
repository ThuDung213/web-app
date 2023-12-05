<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    public function conversation(Request $request,$id)
    {
        $friends = $this->userService->getAllExceptUser(Auth::id());
        $chat_friend = $this->userService->getUserById($id);
        return view('chat.conversation', compact('friends', 'chat_friend'));
    }
}

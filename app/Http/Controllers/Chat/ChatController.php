<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Service\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $friends = $this->userService->getAllExceptUser(Auth::id());
        return view('chat.index', compact('friends'));
    }
}

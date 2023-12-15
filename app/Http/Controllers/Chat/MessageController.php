<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use App\Service\Message\MessageServiceInterface;
use App\Service\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    private $userService;

    private $messageService;

    public function __construct(UserServiceInterface $userService, MessageServiceInterface $messageService)
    {
        $this->userService = $userService;
        $this->messageService = $messageService;

    }
    public function conversation(Request $request,$id)
    {
        $friends = $this->userService->getAllExceptUser(Auth::id());
        $chat_friend = $this->userService->getUserById($id);
        $user = Auth::user();
        // $message = new Message();
        $friend_messages = $chat_friend->message()->get();
        // foreach ($friend_messages as $message) {
        //     dd($message);
        // }
        $messages = $this->messageService->all();
        return view('chat.conversation', compact('friends', 'chat_friend', 'messages'));
    }

    public function sendMessage (Request $request)
    {
        $request->validate([
            'message' => 'required',
            'receiver_id' => 'required'
        ]);

        $sender_id = Auth::id();
        $receiver_id = $request->receiver_id;

        $message = new Message();
        $message->message = $request->message;

        if ($message->save()) {
            try {
                $message->users()->attach($sender_id, ['receiver_id' => $receiver_id]);
                $sender = $this->userService->getUserById($sender_id);

                $data = [];
                $data['$sender_id'] = $sender_id;
                $data['sender_name'] = $sender->name;
                $data['$receiver_id'] = $receiver_id;
                $data['content'] = $message->message;
                $data['create_at'] = $message->created_at;
                $data['message_id'] = $message->id;

                return response()->json([
                    'data' => $data,
                    'status' => true,
                    'message' => 'Message sent successfully'
                ]);

            } catch (\Exception $e) {
                $message->delete();
            }
        }
    }
}

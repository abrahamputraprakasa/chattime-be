<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Chat as ChatEvent;
use app\Models\Chat;

class ChatController extends Controller
{
    function sendMessage(Request $request, Chat $chat){
        $msg = $request->message;
        $chat->message = $msg;
        $chat->save();

        $event = new ChatEvent($msg);
        event($event);
        return $this->successResponse('sent');
    }

    function getMessage(Request $request){
        $chats = Chat::where('room_id', $request->room_id);
        return $this->successResponse('', $chats);
    }
}

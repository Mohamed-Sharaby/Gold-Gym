<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Models\Admin;
use App\Models\Chat;
use App\Notifications\MessageNotification;
use App\Notifications\OrderStatusNotification;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function show(Chat $chat)
    {
        return response()->json(['messages' => MessageResource::collection($chat->messages()->limit(50)->get()), 'chat_id' => $chat->id]);

    }

    public function update(Request $request,Chat $chat)
    {

        $request->validate([
            'message' => 'required|string'
        ]);
        $message = $chat->messages()->create(['message' => $request['message'],'sender_id' => auth()->id(),'sender_type' => Admin::class]);
        $chat->user->notify(new MessageNotification($message));
        return response()->json(['status'=>true,'text' => __('message sent successfully !'), 'message' => new MessageResource($message)]);
    }
}

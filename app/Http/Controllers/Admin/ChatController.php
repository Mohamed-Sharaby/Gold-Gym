<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Chats');
    }


    public function index()
    {
        return view('dashboard.chat.index', ['chats' => Chat::latest('updated_at')->get()]);
    }

    public function show(Chat $chat)
    {
        $chat->messages()->update(['is_read'=>1]);
        return view('dashboard.chat.show')->with('chat', $chat);
    }
}

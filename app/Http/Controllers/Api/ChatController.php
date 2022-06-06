<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaseCollection;
use App\Http\Resources\MessageResource;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        return \responder::success(new BaseCollection(auth()->user()->chat()->firstOrCreate()->messages()->latest()->paginate(20), MessageResource::class));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string'
        ]);
        $chat = auth()->user()->chat()->firstOrCreate();
        $message = $chat->messages()->create([
            'sender_type' => User::class,
            'sender_id' => auth()->id(),
            'message' => $request['message']
        ]);
        return \responder::success(new MessageResource($message));
    }

}

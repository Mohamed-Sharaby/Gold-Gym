<?php

namespace App\Models;

use App\Events\MessageEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'sender_type', 'sender_id', 'chat_id'];

    public function sender()
    {
        return $this->morphTo('sender');
    }

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }

    public static function booted()
    {
        static::created(function (Message $message) {
            broadcast(new MessageEvent($message))->toOthers();
        });
    }
}

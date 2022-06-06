<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $touches = ['messages'];
    protected $fillable = ['user_id'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function unReadCount()
    {
        return $this->messages()->where('is_read',0)->count();
    }

}

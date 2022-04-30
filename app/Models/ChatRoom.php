<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function message()
    {
        return $this->hasMany(Message::class, 'user_id');
        // return $this->hasMany(ChatRoom::class, 'user_one', 'user_two');
    }

    public function users_rooms()
    {
        return $this->hasMany(UsersRoom::class, 'room_id');
        // return $this->hasMany(ChatRoom::class, 'user_one', 'user_two');
    }
}

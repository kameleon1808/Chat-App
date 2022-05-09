<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class FriendRequests extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }


    protected function friendsOfThisUser()
    {
        return $this->belongsToMany(User::class, 'friend_requests', 'sender', 'receiver')
            ->withPivot('status')
            ->wherePivot('status', 'confirmed');
    }

    // friendship that this user was asked for
    protected function thisUserFriendOf()
    {
        return $this->belongsToMany(User::class, 'friend_requests', 'receiver', 'sender')
            ->withPivot('status')
            ->wherePivot('status', 'confirmed');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Friends extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function users_friend()
    // {
    //     return $this->hasMany(User::class, 'friend_id');
    // }

    protected function friendsOfThisUser()
    {
        return $this->belongsToMany(User::class, 'friendships', 'sender', 'receiver')
            ->withPivot('status')
            ->wherePivot('status', 'confirmed');
    }

    // friendship that this user was asked for
    protected function thisUserFriendOf()
    {
        return $this->belongsToMany(User::class, 'friendships', 'receiver', 'sender')
            ->withPivot('status')
            ->wherePivot('status', 'confirmed');
    }
}

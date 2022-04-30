<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Friends extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users_friend()
    {
        return $this->hasMany(UserFriend::class, 'friend_id');
    }
}

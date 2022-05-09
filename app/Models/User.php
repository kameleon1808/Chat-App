<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\FriendRequests;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function friend_request()
    // {
    //     return $this->hasMany(FriendRequests::class, 'sender');
    // }

    // public function friends()
    // {
    //     return $this->hasMany(Friends::class, 'sender');
    // }

    public function friend_requests()
    {
        return $this->hasMany(FriendRequests::class, 'receiver')
            ->where('status', 'pending');
    }


    // =========================================================================================
    public function message()
    {
        return $this->hasMany(Message::class, 'user_id');
        // return $this->hasMany(ChatRoom::class, 'user_one', 'user_two');
    }

    public function users_rooms()
    {
        return $this->hasMany(UsersRoom::class, 'user_id');
        // return $this->hasMany(ChatRoom::class, 'user_one', 'user_two');
    }

    // public function users_friend()
    // {
    //     return $this->hasMany(UserFriend::class, 'user_id');
    // }
}

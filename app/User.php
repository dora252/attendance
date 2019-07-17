<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','admin_flag',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function attendance()
    {
        return $this->hasMany(Time::class);
    }
    
    public function getusers()
    {
        $user = $user->id;
        $userstart = $user->times()->start_time();
        $userend = $user->times()->end_time();
        return User::whereIn('user_id', $user);
    }
}

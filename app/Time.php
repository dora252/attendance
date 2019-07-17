<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = [
        'id', 'date', 'user_id', 'start_time', 'end_time',
        ];
    
    //1対多　ユーザー関連付け
    public function user()
    {
       $this->belongsTo(User::class);
    }
    
}


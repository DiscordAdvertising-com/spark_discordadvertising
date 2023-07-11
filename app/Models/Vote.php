<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'bot_id' => 'string',
        'user_id' => 'string',
    ];
    
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function bot()
    {
        return $this->hasOne(Bot::class, 'id', 'bot_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bot extends Model
{
    use HasFactory;

    protected $guarded = [];

    
    public function tags()
    {
        return $this->hasMany(BotTag::class, 'bot_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(BotUser::class, 'bot_id', 'id');
    }

}

<?php

namespace App\Models;

use App\Models\BotVote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bot extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'id' => 'string',
    ];

    public function tags()
    {
        return $this->hasMany(BotTag::class, 'bot_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(BotUser::class, 'bot_id', 'id');
    }

    public function lister()
    {
        return $this->hasOne(User::class, 'id', 'author');
    }

    public function votes()
    {
        return $this->hasMany(BotVote::class, 'bot_id', 'id');
    }

}

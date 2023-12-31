<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BotTag extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    protected $casts = [
        'bot_id' => 'string',
    ];

}

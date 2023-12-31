<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function bots()
    {
        return $this->hasMany(BotTag::class, 'tag', 'name');
    }

    public function servers()
    {
        return $this->hasMany(ServerTag::class, 'tag', 'name');
    }

    public $timestamps = false;

}

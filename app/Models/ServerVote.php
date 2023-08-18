<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerVote extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'server_id' => 'string',
        'user_id' => 'string',
    ];
    
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function server()
    {
        return $this->hasOne(Server::class, 'id', 'server_id');
    }

}

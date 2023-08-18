<?php

namespace App\Models;

use App\Models\ServerVote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Server extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'id' => 'string',
    ];

    public function tags()
    {
        return $this->hasMany(ServerTag::class, 'server_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(ServerUser::class, 'server_id', 'id');
    }

    public function lister()
    {
        return $this->hasOne(User::class, 'id', 'author');
    }

    public function votes()
    {
        return $this->hasMany(ServerVote::class, 'server_id', 'id');
    }

}

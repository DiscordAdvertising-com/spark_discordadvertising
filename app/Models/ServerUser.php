<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerUser extends Model
{
    use HasFactory;

    protected $casts = [
        'server_id' => 'string',
        'user_id' => 'string',
    ];

    protected $guarded = [];
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}

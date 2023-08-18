<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerTag extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    protected $casts = [
        'server_id' => 'string',
    ];

}

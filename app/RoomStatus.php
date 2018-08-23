<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomStatus extends Model
{
    protected $fillable = [
        'status', 'color',
    ];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $fillable = [
        'name', 'short_name'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}

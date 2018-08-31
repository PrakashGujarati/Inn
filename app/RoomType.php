<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomType extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'short_name'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}

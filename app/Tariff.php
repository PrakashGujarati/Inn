<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    protected $fillable = [
        'room_id','noofpersons', 'tariff', 'extra_bad',
    ];


    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}

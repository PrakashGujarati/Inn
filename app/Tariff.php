<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    protected $fillable = [
        'room_id', 'tariff', 'extra_bed_tariff',
    ];


    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}

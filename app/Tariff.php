<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tariff extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'room_id', 'tariff', 'extra_bed_tariff',
    ];


    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}

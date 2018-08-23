<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'roomtype_id', 'room_no', 'capacity', 'ext_no',
    ];


    public function roomtype()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function tariffs()
    {
        return $this->hasMany(Tariff::class);
    }
}

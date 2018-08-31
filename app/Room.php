<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'roomtype_id', 'room_no', 'capacity', 'extension_no',
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

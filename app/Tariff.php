<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\RoomType;

class Tariff extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'room_no', 'roomtype_id', 'capacity'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function roomtype()
    {
        return $this->belongsTo(RoomType::class);
    }





}

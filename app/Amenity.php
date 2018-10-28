<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Amenity extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','amenity_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

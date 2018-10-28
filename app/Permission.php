<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{


    public $timestamps = false;

    protected $fillable = [
        'hotelcode', 'name','slug', 'description','model',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'permission_role');
    }
}

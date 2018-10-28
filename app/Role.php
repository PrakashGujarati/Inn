<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','hotelcode','slug','description','level'
    ];

    public $timestamps = false;

    public function users()
    {
        $this->hasMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'permission_role');
    }
}

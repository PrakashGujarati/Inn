<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HouseKeeper extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','mobile_no','user_name','password'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Identity extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','sname'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

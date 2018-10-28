<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HousekeepingStatus extends Model
{
    use SoftDeletes;
    protected $fillable = ['status','color','is_dirty'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

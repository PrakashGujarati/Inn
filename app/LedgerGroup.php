<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LedgerGroup extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','alias'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ledgers()
    {
        return $this->hasMany(Ledger::class);
    }
}

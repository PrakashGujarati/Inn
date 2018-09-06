<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ledger extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','alias','opening','connect_with','group_id','tally_name','dob','is_employee','address','city','pincode','phone_no','mobile_no','email','discount','native','reference_name','state','nationality','gstn_no'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function group()
    {
        return $this->belongsTo(LedgerGroup::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)
            ->diffForHumans();
    }
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)
            ->diffForHumans();
    }

}

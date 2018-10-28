<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Tax extends Model
{
     use SoftDeletes;
    protected $fillable = ['short_name','tax_name','applies_from','exempt_after','posting_type','flat_amount','flat_percentage','no_of_slab','apply_pax','apply_tax','is_on_rackrate'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function slabs()
    {
        return $this->hasMany(TaxSlab::class);
    }

    public function setAppliesFromAttribute($value)
    {
        $this->attributes['applies_from'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function getAppliesFromAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

}
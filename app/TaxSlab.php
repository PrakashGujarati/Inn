<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxSlab extends Model
{

    protected $fillable = ['tax_id','from','top','percentage'];
    protected $timestamp = false;

    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }
}

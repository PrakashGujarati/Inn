<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Tariff;

class RoomType extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'short_name','person_one','person_two','person_three','person_four','person_five','extra_person','person_one_nac','person_two_nac','person_three_nac','person_four_nac','person_five_nac','extra_person_nac'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

   public function tariffs()
   {
       return $this->hasMany(Tariff::class);
   }
}

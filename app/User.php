<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoleAndPermission;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'hotelcode', 'password','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function roomstatus()
    {
        return $this->hasMany(RoomStatus::class);
    }
    public function tariffs()
    {
        return $this->hasMany(Tariff::class);
    }
    public function roomtypes()
    {
        return $this->hasMany(RoomType::class);
    }
    public function ledgers()
    {
        return $this->hasMany(Ledger::class);
    }
    public function ledgerGroups()
    {
        return $this->hasMany(LedgerGroup::class); /** It defines relationship with another table **/
    }
    public function taxes()
    {
        return $this->hasMany(Tax::class); /** It defines relationship with another table **/
    }
    public function houseKeepers()
    {
        return $this->hasMany(HouseKeeper::class); /** It defines relationship with another table **/
    }
    public function housekeepingStatus()
    {
        return $this->hasMany(HousekeepingStatus::class); /** It defines relationship with another table **/
    }
    public function purpose()
    {
        return $this->hasMany(Purpose::class); /** It defines relationship with another table **/
    }
    public function functionMaster()
    {
        return $this->hasMany(Functionmaster::class); /** It defines relationship with another table **/
    }
    public function reason()
    {
        return $this->hasMany(Reason::class); /** It defines relationship with another table **/
    }
    public function note()
    {
        return $this->hasMany(Note::class); /** It defines relationship with another table **/
    }
    public function instruction()
    {
        return $this->hasMany(Instruction::class); /** It defines relationship with another table **/
    }
    public function identity()
    {
        return $this->hasMany(Identity::class); /** It defines relationship with another table **/
    }
    public function transportation()
    {
        return $this->hasMany(Transportation::class); /** It defines relationship with another table **/
    }
    public function amenity()
    {
        return $this->hasMany(Amenity::class); /** It defines relationship with another table **/
    }
}

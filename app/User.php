<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
   
    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    public function region(){
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function tempRegion(){
        return $this->belongsTo(Region::class, 'tregion_id');
    }

    public function zone(){
        return $this->belongsTo(Zone::class, 'zone_id');
    }

    public function tempZone(){
        return $this->belongsTo(Zone::class, 'tzone_id');
    }


    public function district(){
        return $this->belongsTo(District::class, 'district_id');
    }

    public function tempDistrict(){
        return $this->belongsTo(District::class, 'tdistrict_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

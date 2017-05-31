<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $fillable = [
        'id','name','phone','address','birthday','gender','id_role', 'email', 'password','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public $timestamps = true;


    public function role(){
        return $this->belongsTo('App\Role','id_role');
    }


    public function room(){
        return $this->hasMany('App\Room','id');
    }


    public function roomtype(){
        return $this->hasMany('App\Roomtype','id');
    }


    public function useservice(){
        return $this->hasMany('App\UseService','id');
    }


    public function service(){
        return $this->hasMany('App\Service','id');
    }


    public function bill(){
        return $this->hasMany('App\Bill','id');
    }

     public function getStaffByID($id)
    {
        return self::findOrFail($id);
    }

    public function getListStaff()
    {
        return self::get();
    }
}

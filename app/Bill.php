<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'bills';


    protected $fillable = [
        'id', 'roomnumber','id_customer','roomcharge','servicecharge','date_in','date_out','id_typeroom','prepay','id_admin'
    ];


    public $timestamps = true;


    public function customer(){
    	return $this->belongsTo('App\Customer','id_customer');
    }

    public function roomtype(){
    	return $this->belongsTo('App\Roomtype','id_roomtype');
    }

    public function admin(){
    	return $this->belongsTo('App\Admin','id_admin');
    }

    public function status(){
        return $this->belongsTo('App\Status','status');
    }

    public function useservice(){
    	return $this->hasMany('App\UseService','id');
    }

    public function getAllBill()
    {
        return self::get();
    }
    public function getBookingByID($id)
    {
        return self::find($id);
    }
}

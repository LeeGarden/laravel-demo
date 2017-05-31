<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UseService extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $table = 'use_services';


    protected $fillable = [
        'id_service','id_bill','quantity','id_admin'
    ];

    public $timestamps = true;


    public function service(){
    	return $this->belongsTo('App\Service','id_service');
    }

    public function admin(){
    	return $this->belongsTo('App\Admin','id_admin');
    }

    public function bill(){
    	return $this->belongsTo('App\Bill','id_bill');
    }
    public function getAllUseService()
    {
        return self::get();
    }
    public function getUseServiceByID($id)
    {
        return self::find($id);
    }
}

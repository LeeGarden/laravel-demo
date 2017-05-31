<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $table = 'services';


    protected $fillable = [
        'id','name','price','id_admin'
    ];


    public $timestamps = true;


    public function admin(){
    	return $this->belongsTo('App\Admin','id_admin');
    }

    public function useservice(){
    	return $this->hasMany('App\UseService','id');
    }

    public function saveService()
    {
        return self::saveOrFail();
    }

    public function getListService()
    {
        return self::get();
    }
    public function getServiceByID($id)
    {
        return self::find($id);
    }
}


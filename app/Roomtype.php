<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roomtype extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $table = 'roomtypes';


    protected $fillable = [
    'id','typename','slug','maxpeople','price','id_admin','image','utility','description'
    ];


    public $timestamps = true;


    public function room(){
    	return $this->hasMany('App\Room','id');
    }



    public function bill(){
    	return $this->hasMany('App\Bill','id');
    }

    public function admin(){
    	return $this->belongsTo('App\Admin','id_admin');
    }


    //customize function
    public function saveRoomtype()
    {
        return self::saveOrFail();
    }


    public function getListRoomtype()
    {
        return self::get();
    }


    public function getRoomtypeByID($id)
    {
        return self::find($id);
    }



}

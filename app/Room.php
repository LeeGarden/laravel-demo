<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $table = 'rooms';



    protected $fillable = [
        'roomnumber','id_roomtype','id_admin'
    ];


    public $timestamp = true;


    public function admin(){
    	return $this->belongsTo('App\Admin','id_admin');
    }


    public function roomtype(){
    	return $this->belongsTo('App\Roomtype','id_roomtype');
    }


    

    
    public function getRoomByID($id)
    {
        return self::findOrFail($id);
    }

    public function getListRoom()
    {
        return self::get();
    }
}

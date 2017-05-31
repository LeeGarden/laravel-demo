<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $table = 'roles';


    protected $fillable = [
        'id', 'role'
    ];

    public $timestamps = true;


    public function admin(){
    	return $this->hasMany('App\Admin','id');
    }

    public function getListRole()
    {
        return self::get();
    }
    public function getRoleByID($id)
    {
        return self::find($id);
    }
}

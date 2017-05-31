<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'customers';


    protected $fillable = [
        'id', 'name', 'address', 'phone', 'email', 'gender', 'job', 'nationality','id_admin'
    ];

    public $timestamps = true;


    public function bill(){
    	return $this->hasMany('App\Bill','id');
    }

    public function getListCustomer()
    {
        return self::get();
    }
}

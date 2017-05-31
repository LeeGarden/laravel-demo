<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';


    protected $fillable = [
        'id', 'status'
    ];


    public $timestamps = true;

    public function bill()
    {
    	return hasMany('App\Bill','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
	/**
    *This is the School module which is a extension of the Model
    *This module will create School Class
    *
    */
	protected $table='school';
    protected $fillable=[
    'user_id','schoolName','schoolEmail','school_id','address','city/Town','country','tnc','active'
    ];


     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}

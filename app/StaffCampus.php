<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffCampus extends Model
{
    //
    protected $table='staff_campus';
    protected $fillable=[
    	'user_id','staff_id','campus_id'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
	protected $table='class';
	       
    protected $fillable=
    ['user_id','className','class_code','active'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampusClasses extends Model
{
    
    protected $table='campus_classes';
    protected $fillable=
    ['user_id','campus_id','class_id'];
}

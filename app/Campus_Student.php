<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus_Student extends Model
{
    protected $table='campus_student';
    protected $fillable=
    ['user_id','campus_id','class_id','students_id','active'];
}

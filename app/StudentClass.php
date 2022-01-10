<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    //
    protected $table='students_class';
    protected $fillable=
    ['user_id','campus_id','class_id','student_id','student_code','active'];
}

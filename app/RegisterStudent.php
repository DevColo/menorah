<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterStudent extends Model
{
    //
    protected $table='students';
    protected $fillable=
    ['user_id','student_photo','firstName','lastName','middleName','Nationality','address',
    'studentEmail','phone','cOFBirth','city','dOfBirth','sex','fatherfullName','father_living','fatherOccupation','motherfullName','mother_living','mother_Occupation','guardianContact','Religion','physical_defects','previousSchoolName','previousSchoolAddress','active'];



}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterStaffModel extends Model
{
    //
protected $table='staff';
protected $fillable=
['user_id','staff_code','staff_photo','firstName','middleName','lastName','email','phoneNumber','dofBirth','Address','city','Nationality', 'country','sex','marriageStatus','employmentDate','Religion','physicalDefect','active'];
}


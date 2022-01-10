<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolSujects extends Model
{
    protected $table='subjects';
    protected $fillable= 
     ['user_id','class_id','subjectName','subject_code','active'];

}

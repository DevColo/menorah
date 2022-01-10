<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicYearModel extends Model
{
protected $table = 'yearbook';
protected $fillable = [
        'year', 'startdate', 'enddate','user_id',
    ];
}

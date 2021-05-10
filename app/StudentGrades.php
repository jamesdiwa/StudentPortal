<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentGrades extends Model
{
    protected $table = 'student_grades';

    protected $guarded = ['id'];
}

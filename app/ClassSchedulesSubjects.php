<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSchedulesSubjects extends Model
{
    protected $table = 'class_schedules_subjects';

    protected $guarded = ['id'];


    public function classSchedule(){
        return $this->hasOne(Enrolled::class , 'classSchedId', 'classScheduleId'); 
    }


}

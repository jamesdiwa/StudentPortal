<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrolled extends Model
{
    protected $table = 'enrolleds';

    protected $guarded = ['id'];

    public function enrolled(){
        return $this->hasOne(ClassSchedules::class , 'id', 'classSchedId'); 
    }

    public function studentInfo(){
        return $this->hasOne(User::class , 'id', 'userId'); 
    }

    

}

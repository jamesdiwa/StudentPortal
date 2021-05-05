<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSchoolRelatedInfo extends Model
{
    //
    protected $table = 'user_school_related_infos';

    protected $guarded = ['id'];

    public function teacherInfo(){
        return $this->belongsTo(User::class , 'userId', 'id'); 
    }
    
}

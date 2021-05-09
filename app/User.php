<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','password','accountType','firstName','middleName','lastName','month','day','year','gender','permanentAddress','presentAddress' ,  
        'email','contactNumber','isActivated','status','department','remember_token','gradeLevel','grade1','grade2','grade3','grade4','grade5','grade6',
        'grade7','grade8','grade9','grade10'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function studentGuardian(){
        return $this->hasOne(StudentGuardianInfo::class , 'userId', 'id'); 
    }

    public function studentRequirements(){
        return $this->hasOne(StudentRequirements::class , 'userId', 'id'); 
    }

    public function userSchoolRelatedInfo(){
        return $this->hasOne(UserSchoolRelatedInfo::class , 'userId', 'id'); 
    }
    
}

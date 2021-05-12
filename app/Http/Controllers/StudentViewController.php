<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\Announcements;
use App\StudentGrades; 
use App\Enrolled; 
use App\Payments;  
use App\ClassSchedules;
use App\ClassSchedulesSubjects;
use Session;
use Auth;
use Carbon\Carbon;

class StudentViewController extends Controller
{
    public function studentCalendar()
    {
        Session::put('vtab','events');

        $tasks = Events::all();
        return view('StudentView.studentCalendar', compact('tasks'));
    }
    public function studentAnnouncement()
    {
        Session::put('vtab','announcement');

        $announcement = Announcements::whereDate('date_to','>=',Carbon::today('Asia/Manila'))->get();


        return view('StudentView.studentAnnouncement', compact('announcement'));
    }
    public function studentGrade()
    {
        Session::put('vtab','grading');

        $enrolled = Enrolled::where('userId',Auth::id())->get();

        return view('StudentView.studentGrade',compact('enrolled'));
    }

    public function studentGradeShow(Request $request)
    {
        Session::put('vtab','grading');

        $enrolled = Enrolled::find($request->enrolledId);

        $grades = StudentGrades::where('enrolledId',$request->enrolledId)->get();

        return view('StudentView.studentGradeShow',compact('enrolled','grades'));
    }


    public function studentAccount()
    {
        Session::put('vtab','account');

        $enrolled = Enrolled::where('userId',Auth::id())->get();

        return view('StudentView.studentAccount',compact('enrolled'));
    }

    public function studentAccountShow(Request $request)
    {
        Session::put('vtab','account');

        $enrolled = Enrolled::find($request->enrolledId);

        $payments = Payments::where('enrolledId',$request->enrolledId)->get();

        return view('StudentView.studentAccountShow',compact('enrolled','payments'));
    }


    public function studentClassSchedule()
    {
        Session::put('vtab','schedule');

        $latestEnrolled = Enrolled::where('userId',Auth::id())->latest()->first();

        $classSched = ClassSchedules::find($latestEnrolled->classSchedId);

        $mondaySched = ClassSchedulesSubjects::where('classScheduleId',$latestEnrolled->classSchedId)->where('day','Monday')->orderBy('timeFrom')->get();
        $teusdaySched = ClassSchedulesSubjects::where('classScheduleId',$latestEnrolled->classSchedId)->where('day','Teusday')->orderBy('timeFrom')->get();
        $wednesdaySched = ClassSchedulesSubjects::where('classScheduleId',$latestEnrolled->classSchedId)->where('day','Wednesday')->orderBy('timeFrom')->get();
        $thursdaySched = ClassSchedulesSubjects::where('classScheduleId',$latestEnrolled->classSchedId)->where('day','Thursday')->orderBy('timeFrom')->get();
        $fridaySched = ClassSchedulesSubjects::where('classScheduleId',$latestEnrolled->classSchedId)->where('day','Friday')->orderBy('timeFrom')->get();

        return view('StudentView.studentClassSchedule',compact('classSched','mondaySched','teusdaySched','wednesdaySched','thursdaySched','fridaySched'));

    }
}

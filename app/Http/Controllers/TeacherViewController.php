<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\Announcements;
use App\ClassSchedules;
use App\ClassSchedulesSubjects;
use App\Enrolled;
use App\User;
use App\StudentGrades;
use App\UserSchoolRelatedInfo;
use Session;
use Auth;
use Carbon\Carbon;

class TeacherViewController extends Controller
{
    public function teacherCalendar()
    {
        Session::put('vtab','events');

        $tasks = Events::all();
        return view('TeacherView.teacherCalendar', compact('tasks'));
    }
    public function teacherAnnouncement()
    {
        Session::put('vtab','announcement');

        $announcement = Announcements::whereDate('date_to','>=',Carbon::today('Asia/Manila'))->get();
        return view('TeacherView.teacherAnnouncement', compact('announcement'));
    }

    public function index()
    {
        Session::put('vtab','grading');

        $teacherSubject = UserSchoolRelatedInfo::where('userId',Auth::id())->get();


        return view('TeacherView.teacherGrade.index',compact('teacherSubject'));
    }


     public function classIndex(Request $request)
        {
            $subject = $request->subject;

            $classSection = ClassSchedulesSubjects::where('teacherId',Auth::id())->where('subject',$request->subject)->groupBy('classScheduleId')->pluck('classScheduleId');
        

            $classSchedules = ClassSchedules::whereIn('id',$classSection)->get();

            return view('TeacherView.teacherGrade.classIndex',compact('classSchedules','subject'));
        }

    public function classStudents(Request $request)
        {
            $subject = $request->subject;

            $classSchedules = ClassSchedules::find($request->classSchedId);

            $studentGrades = StudentGrades::where('classSchedId',$request->classSchedId)->where('subject',$subject)->get();

            return view('TeacherView.teacherGrade.gradingBySection',compact('studentGrades','classSchedules','subject'));

        }



    public function classStudentsStore(Request $request)
    {
        // StudentGrades::where('userId',$request->userId)->where('enrolledId',$request->enrolledId)->where('classSchedId',$request->classSchedId)->where('subject',$request->subject)->delete();

        $input = $request->all();

            foreach($input['grades'] as $row) {
                StudentGrades::where('userId',$row['userId'])->where('enrolledId',$row['enrolledId'])->where('classSchedId',$row['classSchedId'])->where('subject', $row['subject'])->delete();
            }

            foreach($input['grades'] as $row) {
                $inputArr[] = [
                    'userId' =>  $row['userId'],
                    'enrolledId' => $row['enrolledId'],
                    'classSchedId' => $row['classSchedId'],
                    'gradeLevel' => $row['gradeLevel'],
                    'subject' => $row['subject'],
                    'firstQuarter' => $row['firstQuarter'],
                    'secondQuarter' => $row['secondQuarter'],
                    'thirdQuarter' => $row['thirdQuarter'],
                    'fourthQuarter' => $row['fourthQuarter'],
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ];
            }
    
            StudentGrades::insert($inputArr);


            return redirect()->route('gradingIndex')->with('success', 'Grades Updated Successfully');

    }





    public function show()
    {
        return view('TeacherView.teacherGrade.show');
    }
    public function edit()
    {
        return view('TeacherView.teacherGrade.edit');
    }






}

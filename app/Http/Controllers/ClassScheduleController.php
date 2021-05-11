<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use App\UserSchoolRelatedInfo;
use App\ClassSchedules;
use App\ClassSchedulesSubjects;
use App\GradeAndSubjects;

use Carbon\Carbon;

class ClassScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('vtab','classSchedule');

        $classSchedules = ClassSchedules::all();

        return view('ClassSchedules.index',compact('classSchedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = User::where('accountType','Teacher')->get();
        return view('ClassSchedules.create',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ClassSchedules::create([
            'gradeLevel' => $request->gradeLevel,
            'gradeLevelIcon' => $request->gradeLevelIcon,
            'section' => $request->section,
            'schoolYearFrom' => $request->schoolYearFrom,
            'schoolYearTo' => $request->schoolYearTo,
            'classAdviser' => $request->classAdviser,
            'adviserGender' => $request->adviserGender,
            'notes' => $request->notes,
        ]);


        return redirect()->route('classSchedule.index')->with('success', 'Class Schedule Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classSched = ClassSchedules::find($id);

        $mondaySched = ClassSchedulesSubjects::where('classScheduleId',$id)->where('day','Monday')->orderBy('timeFrom')->get();
        $teusdaySched = ClassSchedulesSubjects::where('classScheduleId',$id)->where('day','Teusday')->orderBy('timeFrom')->get();
        $wednesdaySched = ClassSchedulesSubjects::where('classScheduleId',$id)->where('day','Wednesday')->orderBy('timeFrom')->get();
        $thursdaySched = ClassSchedulesSubjects::where('classScheduleId',$id)->where('day','Thursday')->orderBy('timeFrom')->get();
        $fridaySched = ClassSchedulesSubjects::where('classScheduleId',$id)->where('day','Friday')->orderBy('timeFrom')->get();

        return view('ClassSchedules.show',compact('classSched','mondaySched','teusdaySched','wednesdaySched','thursdaySched','fridaySched'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classSched = ClassSchedules::find($id);
        $teachers = User::where('accountType','Teacher')->get();

        return view('ClassSchedules.edit',compact('classSched','teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ClassSchedules::find($id)->update([
            'gradeLevel' => $request->gradeLevel,
            'gradeLevelIcon' => $request->gradeLevelIcon,
            'section' => $request->section,
            'schoolYearFrom' => $request->schoolYearFrom,
            'schoolYearTo' => $request->schoolYearTo,
            'classAdviser' => $request->classAdviser,
            'adviserGender' => $request->adviserGender,
            'notes' => $request->notes,
        ]);

        return redirect()->route('classSchedule.show',$id)->with('success', 'Class Schedule Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

//Create
    public function createSchedSubject(Request $request){

        $gradeLevel = $request->gradeLevel;
        $day = $request->day;
        $id = $request->id;

        $teachers = UserSchoolRelatedInfo::all();

        $subjects = GradeAndSubjects::where('gradeLevel',$gradeLevel)->orderBy('count')->get();

        $mondaySched = ClassSchedulesSubjects::where('classScheduleId',$id)->where('day','Monday')->get();
        $teusdaySched = ClassSchedulesSubjects::where('classScheduleId',$id)->where('day','Teusday')->get();
        $wednesdaySched = ClassSchedulesSubjects::where('classScheduleId',$id)->where('day','Wednesday')->get();
        $thursdaySched = ClassSchedulesSubjects::where('classScheduleId',$id)->where('day','Thursday')->get();
        $fridaySched = ClassSchedulesSubjects::where('classScheduleId',$id)->where('day','Friday')->get();
       
        return view('ClassSchedules.createSched',compact('teachers','gradeLevel','day','id','subjects','mondaySched','teusdaySched','wednesdaySched'
                    ,'thursdaySched','fridaySched'));
    }

    public function createSchedSubjectStore(Request $request){

        $input = $request->all();

         foreach($input['inputArr'] as $row) {
             $inputArr[] = [
                 'classScheduleId' => $request->id,
                 'timeFrom' => $row['timeFrom'],
                 'timeTo' => $row['timeTo'],
                 'subject' => $row['subject'],
                 'subjectTeacher' => $row['subjectTeacher'],
                 'teacherId' => $row['teacherId'],
                 'day' => $request->day,
                 'created_at' => Carbon::now()->toDateTimeString(),
                 'updated_at' => Carbon::now()->toDateTimeString(),
             ];
         }
 
         ClassSchedulesSubjects::insert($inputArr);


//monday
        if($request->mondayCheckbox == "yes"){
            $input = $request->all();

            foreach($input['inputArr'] as $row) {
                $mondayArray[] = [
                    'classScheduleId' => $request->id,
                    'timeFrom' => $row['timeFrom'],
                    'timeTo' => $row['timeTo'],
                    'subject' => $row['subject'],
                    'subjectTeacher' => $row['subjectTeacher'],
                    'teacherId' => $row['teacherId'],
                    'day' => 'Monday',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ];
            }
    
            ClassSchedulesSubjects::insert($mondayArray);
        }
         
        if($request->teusdayCheckbox == "yes"){
            $input = $request->all();

            foreach($input['inputArr'] as $row) {
                $teusdayArray[] = [
                    'classScheduleId' => $request->id,
                    'timeFrom' => $row['timeFrom'],
                    'timeTo' => $row['timeTo'],
                    'subject' => $row['subject'],
                    'subjectTeacher' => $row['subjectTeacher'],
                    'teacherId' => $row['teacherId'],
                    'day' => 'Teusday',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ];
            }
    
            ClassSchedulesSubjects::insert($teusdayArray);
        }

        if($request->wednesdayCheckbox == "yes"){
            $input = $request->all();

            foreach($input['inputArr'] as $row) {
                $wednesdayArray[] = [
                    'classScheduleId' => $request->id,
                    'timeFrom' => $row['timeFrom'],
                    'timeTo' => $row['timeTo'],
                    'subject' => $row['subject'],
                    'subjectTeacher' => $row['subjectTeacher'],
                    'teacherId' => $row['teacherId'],
                    'day' => 'Wednesday',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ];
            }
    
            ClassSchedulesSubjects::insert($wednesdayArray);
        }

        if($request->thursdayCheckbox == "yes"){
            $input = $request->all();

            foreach($input['inputArr'] as $row) {
                $thursdayArray[] = [
                    'classScheduleId' => $request->id,
                    'timeFrom' => $row['timeFrom'],
                    'timeTo' => $row['timeTo'],
                    'subject' => $row['subject'],
                    'subjectTeacher' => $row['subjectTeacher'],
                    'teacherId' => $row['teacherId'],
                    'day' => 'Thursday',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ];
            }
    
            ClassSchedulesSubjects::insert($thursdayArray);
        }

        if($request->fridayCheckbox == "yes"){
            $input = $request->all();

            foreach($input['inputArr'] as $row) {
                $fridayArray[] = [
                    'classScheduleId' => $request->id,
                    'timeFrom' => $row['timeFrom'],
                    'timeTo' => $row['timeTo'],
                    'subject' => $row['subject'],
                    'subjectTeacher' => $row['subjectTeacher'],
                    'teacherId' => $row['teacherId'],
                    'day' => 'Friday',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ];
            }
    
            ClassSchedulesSubjects::insert($fridayArray);
        }


         return redirect()->route('classSchedule.show',$request->id)->with('success', 'Class Schedule Created Successfully');
    }

    //Update
    public function editSchedSubject(Request $request){

        $day = $request->day;
        $id = $request->id;

        $schedSubjects = ClassSchedulesSubjects::where('day',$day)->where('classScheduleId',$id)->get();

        $teachers = UserSchoolRelatedInfo::all();
    
        return view('ClassSchedules.editSched',compact('teachers','day','id','schedSubjects'));
    }

    public function editSchedSubjectUpdate(Request $request){

        ClassSchedulesSubjects::where('classScheduleId',$request->id)->where('day',$request->day)->delete();

        $input = $request->all();

         foreach($input['inputArr'] as $row) {
             $inputArr[] = [
                 'classScheduleId' => $request->id,
                 'timeFrom' => $row['timeFrom'],
                 'timeTo' => $row['timeTo'],
                 'subject' => $row['subject'],
                 'subjectTeacher' => $row['subjectTeacher'],
                 'teacherId' => $row['teacherId'],
                 'day' => $request->day,
                 'created_at' => Carbon::now()->toDateTimeString(),
                 'updated_at' => Carbon::now()->toDateTimeString(),
             ];
         }
 
         ClassSchedulesSubjects::insert($inputArr);

         return redirect()->route('classSchedule.show',$request->id)->with('success', 'Class Schedule Updated Successfully');
    }

}

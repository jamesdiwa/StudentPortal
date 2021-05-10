<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enrolled;
use App\StudentGrades;

use Carbon\Carbon;


class GradingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrolled = Enrolled::where('status','Ongoing')->get();
        
        return view('Students.Grading.index',compact('enrolled'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Students.Grading.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enrolled = Enrolled::find($id);

        $studentGrades = StudentGrades::where('enrolledId',$id)->get();


        return view('Students.Grading.show',compact('enrolled','studentGrades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enrolled = Enrolled::find($id);

        $studentGrades = StudentGrades::where('enrolledId',$id)->get();

        return view('Students.Grading.edit',compact('enrolled','studentGrades'));
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
        //
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

    public function studentGradeStore(Request $request)
    {
        StudentGrades::where('userId',$request->userId)->where('enrolledId',$request->enrolledId)->delete();

        $input = $request->all();

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


         return redirect()->route('grading.show',$request->enrolledId)->with('success', 'Grades Updated Successfully');

    }


    
}

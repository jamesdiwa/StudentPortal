<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ClassSchedules;
use App\ClassSchedulesSubjects;
use App\Enrolled;
use App\Payments;
use App\StudentGrades;
use App\GradeAndSubjects;


class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Students.Enrollment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Students.Enrollment.create');
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

       

        if($request->typeOfPayment == "Full Payment"){
          $enrolledId =  Enrolled::create([
                'userId' => $request->userId,
                'classSchedId' => $request->section,
                'typeOfPayment' => $request->typeOfPayment,
                'tuitionFee' => $request->tuitionFee1,
                'gradeLevel' => $request->gradeLevel,
                'paymentStatus' => 'Fully Paid',
            ])->id;

            Payments::create([
                'userId' => $request->userId,
                'classSchedId' =>$request->section,
                'enrolledId' => $enrolledId,
                'sy' => $request->sy,
                'paymentAmount' => $request->payment1,
                'dateOfPayment' => $request->date1,
                'notes' => $request->notes1,
                'remarks' => 'Fully Paid',
            ]);

        }else{
            $enrolledId = Enrolled::create([
                'userId' => $request->userId,
                'classSchedId' => $request->section,
                'typeOfPayment' => $request->typeOfPayment,
                'tuitionFee' => $request->tuitionFee2,
                'monthlyPayment' => $request->monthlyPayment2,
                'gradeLevel' => $request->gradeLevel,
                'paymentStatus' => 'Partially Paid',
            ])->id;

            Payments::create([
                'userId' => $request->userId,
                'classSchedId' =>$request->section,
                'enrolledId' => $enrolledId,
                'sy' => $request->sy,
                'paymentAmount' => $request->payment2,
                'dateOfPayment' => $request->date2,
                'notes' => $request->notes2,
                'remarks' => 'Downpayment',
            ]);
        }


        $subjects = GradeAndSubjects::where('GradeLevel',$request->gradeLevel)->get();

        foreach($subjects as $subject){
            StudentGrades::create([
                'userId' => $request->userId,
                'enrolledId' => $enrolledId,
                'classSchedId' =>$request->section,
                'gradeLevel' => $request->gradeLevel,
                'subject' => $subject->Subject,
            ]);
        }

        if($request->gradeLevel == 'Grade 1'){
            User::find($request->userId)->update([
                'grade1' => 'Enrolled',
            ]);
            return redirect()->route('Grade1Index')->with('success', 'Student Enrolled Successfully');
        }else if($request->gradeLevel == 'Grade 2'){
            User::find($request->userId)->update([
                'grade2' => 'Enrolled',
            ]);
            return redirect()->route('Grade2Index')->with('success', 'Student Enrolled Successfully');
        }else if($request->gradeLevel == 'Grade 3'){
            User::find($request->userId)->update([
                'grade3' => 'Enrolled',
            ]);
            return redirect()->route('Grade3Index')->with('success', 'Student Enrolled Successfully');
        }else if($request->gradeLevel == 'Grade 4'){
            User::find($request->userId)->update([
                'grade4' => 'Enrolled',
            ]);
            return redirect()->route('Grade4Index')->with('success', 'Student Enrolled Successfully');
        }else if($request->gradeLevel == 'Grade 5'){
            User::find($request->userId)->update([
                'grade5' => 'Enrolled',
            ]);
            return redirect()->route('Grade5Index')->with('success', 'Student Enrolled Successfully');
        }else if($request->gradeLevel == 'Grade 6'){
            User::find($request->userId)->update([
                'grade6' => 'Enrolled',
            ]);
            return redirect()->route('Grade6Index')->with('success', 'Student Enrolled Successfully');
        }else if($request->gradeLevel == 'Grade 7'){
            User::find($request->userId)->update([
                'grade7' => 'Enrolled',
            ]);
            return redirect()->route('Grade7Index')->with('success', 'Student Enrolled Successfully');
        }else if($request->gradeLevel == 'Grade 8'){
            User::find($request->userId)->update([
                'grade8' => 'Enrolled',
            ]);
            return redirect()->route('Grade8Index')->with('success', 'Student Enrolled Successfully');
        }else if($request->gradeLevel == 'Grade 9'){
            User::find($request->userId)->update([
                'grade9' => 'Enrolled',
            ]);
            return redirect()->route('Grade9Index')->with('success', 'Student Enrolled Successfully');
        }else if($request->gradeLevel == 'Grade 10'){
            User::find($request->userId)->update([
                'grade10' => 'Enrolled',
            ]);
            return redirect()->route('Grade10Index')->with('success', 'Student Enrolled Successfully');
        }




        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Students.Enrollment.edit');
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

    public function enrollCreate(Request $request)
    {
        $student = User::find($request->studentId);
        $gradeLevel = $request->gradeLevel;
    
        $section = ClassSchedules::where('gradeLevel',$request->gradeLevel)->get();


        return view('Students.Enrollment.create',compact('section','student','gradeLevel'));
    }

    public function enrollShow(Request $request)
    {

        $gradeLevel = $request->gradeLevel;
        $enrolled = Enrolled::where('userId',$request->studentId)->where('gradeLevel',$gradeLevel)->first();


        $payments = Payments::where('enrolledId',$enrolled->id)->get();


        return view('Students.Enrollment.show',compact('enrolled','payments','gradeLevel'));
    }


    public function Grade1Index()
    {
        $students = User::where('accountType','Student')->where('isActivated',1)->get();

        return view('Students.Enrollment.grade1Index',compact('students'));
    }

    public function Grade2Index()
    {
        $students = User::where('accountType','Student')->where('isActivated',1)->get();

        return view('Students.Enrollment.grade2Index',compact('students'));
    }

    public function Grade3Index()
    {
        $students = User::where('accountType','Student')->where('isActivated',1)->get();

        return view('Students.Enrollment.grade3Index',compact('students'));
    }

    public function Grade4Index()
    {
        $students = User::where('accountType','Student')->where('isActivated',1)->get();

        return view('Students.Enrollment.grade4Index',compact('students'));
    }

    public function Grade5Index()
    {
        $students = User::where('accountType','Student')->where('isActivated',1)->get();

        return view('Students.Enrollment.grade5Index',compact('students'));
    }

    public function Grade6Index()
    {
        $students = User::where('accountType','Student')->where('isActivated',1)->get();

        return view('Students.Enrollment.grade6Index',compact('students'));
    }

    public function Grade7Index()
    {
        $students = User::where('accountType','Student')->where('isActivated',1)->get();

        return view('Students.Enrollment.grade7Index',compact('students'));
    }

    public function Grade8Index()
    {
        $students = User::where('accountType','Student')->where('isActivated',1)->get();

        return view('Students.Enrollment.grade8Index',compact('students'));
    }

    public function Grade9Index()
    {
        $students = User::where('accountType','Student')->where('isActivated',1)->get();

        return view('Students.Enrollment.grade9Index',compact('students'));
    }

    public function Grade10Index()
    {
        $students = User::where('accountType','Student')->where('isActivated',1)->get();

        return view('Students.Enrollment.grade10Index',compact('students'));
    }
}

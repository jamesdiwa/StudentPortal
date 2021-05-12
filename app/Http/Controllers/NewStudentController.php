<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\StudentGuardianInfo;
use App\StudentRequirements;
use Hash;
use Intervention\Image\ImageManagerStatic as Image;

class NewStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $students = User::where('accountType','Student')->where('isActivated',0)->get();

        return view('Students.NewStudent.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $student = User::find($id);
        
        return view('Students.NewStudent.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = User::find($id);

        return view('Students.NewStudent.enlist',compact('student'));
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
        $user = User::find($id);

        $request->validate([
            'username' => 'required|string|max:20|unique:users',
            'password' => 'required|same:confirm-password',
        ]);
       
        $user->update([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'firstName' => $request->firstName,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'month' => $request->month,
            'day' => $request->day,
            'year' => $request->year,
            'gender' => $request->gender,
            'permanentAddress' => $request->permanentAddress,
            'presentAddress' => $request->presentAddress,
            'email' => $request->email,
            'contactNumber' => $request->contactNumber,
            'isActivated' => '1',
            'status' => 'Registered',
            'remember_token' => str_random(10) . time(),
        ]);

        StudentGuardianInfo::where('userId',$id)->update([
            'gFirstName' => $request->gFirstName,
            'gMiddleName' => $request->gMiddleName,
            'gLastname' => $request->gLastname,
            'gRelationship' => $request->gRelationship,
            'gCompleteAddress' => $request->gCompleteAddress,
            'gContactNumber' => $request->gContactNumber,
        ]);

        StudentRequirements::create([
            'userId' => $id,
            'PBC' => $request->nso,
            'SMR' => $request->medicalRecord,
            'SRC' => $request->reportCard,
            'GMC' => $request->goodMoral,
        ]);

        if($request->gradeLevelCompleted == 'Grade 1'){
            User::find($user->id)->update([
                'grade1' => 'Completed',
            ]);
        }else if($request->gradeLevelCompleted == 'Grade 2'){
            User::find($user->id)->update([
                'grade1' => 'Completed',
                'grade2' => 'Completed',
            ]);
        }else if($request->gradeLevelCompleted == 'Grade 3'){
            User::find($user->id)->update([
                'grade1' => 'Completed',
                'grade2' => 'Completed',
                'grade3' => 'Completed',
            ]);
        }else if($request->gradeLevelCompleted == 'Grade 4'){
            User::find($user->id)->update([
                'grade1' => 'Completed',
                'grade2' => 'Completed',
                'grade3' => 'Completed',
                'grade4' => 'Completed',
            ]);
        }else if($request->gradeLevelCompleted == 'Grade 5'){
            User::find($user->id)->update([
                'grade1' => 'Completed',
                'grade2' => 'Completed',
                'grade3' => 'Completed',
                'grade4' => 'Completed',
                'grade5' => 'Completed',
            ]);
        }else if($request->gradeLevelCompleted == 'Grade 6'){
            User::find($user->id)->update([
                'grade1' => 'Completed',
                'grade2' => 'Completed',
                'grade3' => 'Completed',
                'grade4' => 'Completed',
                'grade5' => 'Completed',
                'grade6' => 'Completed',
            ]);
        }else if($request->gradeLevelCompleted == 'Grade 7'){
            User::find($user->id)->update([
                'grade1' => 'Completed',
                'grade2' => 'Completed',
                'grade3' => 'Completed',
                'grade4' => 'Completed',
                'grade5' => 'Completed',
                'grade6' => 'Completed',
                'grade7' => 'Completed',
            ]);
        }else if($request->gradeLevelCompleted == 'Grade 8'){
            User::find($user->id)->update([
                'grade1' => 'Completed',
                'grade2' => 'Completed',
                'grade3' => 'Completed',
                'grade4' => 'Completed',
                'grade5' => 'Completed',
                'grade6' => 'Completed',
                'grade7' => 'Completed',
                'grade8' => 'Completed',
            ]);
        }else if($request->gradeLevelCompleted == 'Grade 9'){
            User::find($user->id)->update([
                'grade1' => 'Completed',
                'grade2' => 'Completed',
                'grade3' => 'Completed',
                'grade4' => 'Completed',
                'grade5' => 'Completed',
                'grade6' => 'Completed',
                'grade7' => 'Completed',
                'grade8' => 'Completed',
                'grade9' => 'Completed',
            ]);
        }else if($request->gradeLevelCompleted == 'Grade 10'){
            User::find($user->id)->update([
                'grade1' => 'Completed',
                'grade2' => 'Completed',
                'grade3' => 'Completed',
                'grade4' => 'Completed',
                'grade5' => 'Completed',
                'grade6' => 'Completed',
                'grade7' => 'Completed',
                'grade8' => 'Completed',
                'grade9' => 'Completed',
                'grade10' => 'Completed',
            ]);
        }

        if ($request->input('photoPath') != NULL){
            $screen = $request->input('photoPath');
            $filterd_data = substr($screen, strpos($screen, ",")+1);
            //Decode the string
            $unencoded_data=base64_decode($filterd_data);
            $name = time().'.png';
            $user_photo = Image::make($unencoded_data);
            $user_photo-> save(public_path().'/images/UserPhoto/' .  $name);
            $user->photoPath = $name;
            $user->save();
        }

        return redirect()->route('studentList.index')->with('success', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        StudentGuardianInfo::where('userId',$id)->delete();

        return redirect()->route('newStudent.index')->with('success', 'Deleted Successfully.');
    }

    public function registerNew(Request $request){
        $userId =  User::create([
            'accountType' => 'Student',
            'firstName' => $request->firstName,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'month' => $request->month,
            'day' => $request->day,
            'year' => $request->year,
            'gender' => $request->gender,
            'permanentAddress' => $request->permanentAddress,
            'presentAddress' => $request->presentAddress,
            'email' => $request->email,
            'contactNumber' => $request->contactNumber,
            'status' => 'Not yet verified',
        ])->id;

        StudentGuardianInfo::create([
            'userId' => $userId,
            'gFirstName' => $request->gFirstName,
            'gMiddleName' => $request->gMiddleName,
            'gLastname' => $request->gLastname,
            'gRelationship' => $request->gRelationship,
            'gCompleteAddress' => $request->gCompleteAddress,
            'gContactNumber' => $request->gContactNumber,
        ]);

        return redirect()->route('homepage')->with('success', 'Register Successfully.');
    }
}

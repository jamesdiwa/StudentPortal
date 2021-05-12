<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\StudentGuardianInfo;
use App\StudentRequirements;
use App\Enrolled;
use Hash;

use Intervention\Image\ImageManagerStatic as Image;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::where('isActivated',1)->where('accountType','Student')->get();

        return view('Students.StudentList.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Students.StudentList.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'username' => 'required|string|max:20|unique:users',
            'password' => 'required|same:confirm-password',
        ]);
        
          $user =  User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
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
                'status' => 'Registered',
                'isActivated' => '1',
                'remember_token' => str_random(10) . time(),
            ]);

            StudentGuardianInfo::create([
                'userId' => $user->id,
                'gFirstName' => $request->gFirstName,
                'gMiddleName' => $request->gMiddleName,
                'gLastname' => $request->gLastname,
                'gRelationship' => $request->gRelationship,
                'gCompleteAddress' => $request->gCompleteAddress,
                'gContactNumber' => $request->gContactNumber,
            ]);

            StudentRequirements::create([
                'userId' => $user->id,
                'PBC' => $request->nso,
                'SMR' => $request->medicalRecord,
                'SRC' => $request->reportCard,
                'GMC' => $request->goodMoral,
            ]);

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



            return redirect()->route('studentList.index')->with('success', 'User Created Successfully');

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

        $enrolled = Enrolled::where('userId',$id)->get();


        return view('Students.StudentList.show',compact('student','enrolled'));
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

        return view('Students.StudentList.edit',compact('student'));
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
     
        $user->update([
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
        ]);

        StudentGuardianInfo::where('userId',$id)->update([
            'gFirstName' => $request->gFirstName,
            'gMiddleName' => $request->gMiddleName,
            'gLastname' => $request->gLastname,
            'gRelationship' => $request->gRelationship,
            'gCompleteAddress' => $request->gCompleteAddress,
            'gContactNumber' => $request->gContactNumber,
        ]);

        StudentRequirements::where('userId',$id)->update([
            'PBC' => $request->nso,
            'SMR' => $request->medicalRecord,
            'SRC' => $request->reportCard,
            'GMC' => $request->goodMoral,
        ]);

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

        return redirect()->route('studentList.show',$id)->with('success', 'User Updated Successfully');
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
}

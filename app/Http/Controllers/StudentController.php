<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\StudentGuardianInfo;
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
            'email' => 'required|email|unique:users,email',
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

        return view('Students.StudentList.show',compact('student'));
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Enrolled;
use App\Events;
use Session;
use Auth;
use Hash;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('vtab','home');

        Session::put('loginFirstName', Auth::user()->firstName);
        Session::put('loginmiddleName', Auth::user()->middleName);
        Session::put('loginlastName', Auth::user()->lastName);
        Session::put('loginaccountType', Auth::user()->accountType);
        Session::put('loginphotoPath', Auth::user()->photoPath);

        //admin view

        if(Auth::user()->accountType == 'Admin'){
            $teachers = User::where('accountType','Teacher')->get();
            $teacherCount = 0;
    
            foreach($teachers as $teacher){
                $teacherCount++;
            }
    
            $enrolled = Enrolled::all();
            $enrolledCount = 0;
    
            foreach($enrolled as $enrolled){
                $enrolledCount++;
            }
    
            $elistedStudent = User::where('accountType','Student')->where('isActivated','1')->get();
            $elistedStudentCount = 0;
    
            foreach($elistedStudent as $elistedStudent){
                $elistedStudentCount++;
            }
    
            return view('home',compact('teacherCount','enrolledCount','elistedStudentCount'));
    
        }else if(Auth::user()->accountType == 'Teacher'){

            Session::put('vtab','events');

            $tasks = Events::all();
            return view('TeacherView.teacherCalendar', compact('tasks'));

        }else if(Auth::user()->accountType == 'Student'){

            Session::put('vtab','events');

            $tasks = Events::all();
            return view('StudentView.studentCalendar', compact('tasks'));
        }

       





        
    }

    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->route('home')->with("success","Password changed successfully !");

    }
}

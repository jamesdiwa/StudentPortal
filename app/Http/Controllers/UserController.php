<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use Hash;
use App\User;
use Auth;

use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('vtab','user');

        $users = User::where('accountType','!=','Student')->get();

        return view('User.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.create');
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
                'accountType' => $request->accountType,
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
                'remember_token' => str_random(10) . time(),
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

            return redirect()->route('user.index')->with('success', 'User Created Successfully');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        Session::put('loginFirstName', Auth::user()->firstName);
        Session::put('loginmiddleName', Auth::user()->middleName);
        Session::put('loginlastName', Auth::user()->lastName);
        Session::put('loginaccountType', Auth::user()->accountType);
        Session::put('loginphotoPath', Auth::user()->photoPath);

        return view('User.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('User.edit',compact('user'));
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
            'username' => $request->username,
            'accountType' => $request->accountType,
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

        return redirect()->route('user.show',$id)->with('success', 'User Updated Successfully');;
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

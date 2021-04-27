<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
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


        return view('home');
    }
}

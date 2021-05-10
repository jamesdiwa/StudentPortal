<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\Announcements;
use Session;

class StudentViewController extends Controller
{
    public function studentCalendar()
    {
        Session::put('vtab','events');

        $tasks = Events::all();
        return view('StudentView.studentCalendar', compact('tasks'));
    }
    public function studentAnnouncement()
    {
        Session::put('vtab','announcement');

        $announcement = Announcements::all();
        return view('StudentView.studentAnnouncement', compact('announcement'));
    }
    public function studentGrade()
    {
        Session::put('vtab','grading');

        return view('StudentView.studentGrade');
    }
    public function studentAccount()
    {
        Session::put('vtab','account');

        return view('StudentView.studentAccount');
    }
    public function studentClassSchedule()
    {
        Session::put('vtab','schedule');

        return view('StudentView.studentClassSchedule');
    }
}

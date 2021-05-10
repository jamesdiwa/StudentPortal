<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\Announcements;
use Session;

class TeacherViewController extends Controller
{
    public function teacherCalendar()
    {
        Session::put('vtab','events');

        $tasks = Events::all();
        return view('TeacherView.teacherCalendar', compact('tasks'));
    }
    public function teacherAnnouncement()
    {
        Session::put('vtab','announcement');

        $announcement = Announcements::all();
        return view('TeacherView.teacherAnnouncement', compact('announcement'));
    }
    public function index()
    {
        Session::put('vtab','grading');

        return view('TeacherView.teacherGrade.index');
    }
    public function show()
    {
        return view('TeacherView.teacherGrade.show');
    }
    public function edit()
    {
        return view('TeacherView.teacherGrade.edit');
    }
}

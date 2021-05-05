<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use App\UserSchoolRelatedInfo;
use App\ClassSchedules;

class ClassScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('vtab','classSchedule');

        $classSchedules = ClassSchedules::all();

        return view('ClassSchedules.index',compact('classSchedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = User::where('accountType','Teacher')->get();

        //data of teachers with subs
//Grade1
        $g1MotherTongue = UserSchoolRelatedInfo::where('subjects','Mother Tongue')->get();
        $g1Filipino1 = UserSchoolRelatedInfo::where('subjects','Filipino 1')->get();
        $g1English1 = UserSchoolRelatedInfo::where('subjects','English 1')->get();
        $g1Math1 = UserSchoolRelatedInfo::where('subjects','Math 1')->get();
        $g1Science1= UserSchoolRelatedInfo::where('subjects','Science 1')->get();
        $g1AralingPanlipunan1 = UserSchoolRelatedInfo::where('subjects','Araling Panlipunan 1')->get();
        $g1Mapeh1 = UserSchoolRelatedInfo::where('subjects','Mapeh 1')->get();
        $g1EdukasyonsaPagpapakatao1 = UserSchoolRelatedInfo::where('subjects','Edukasyon sa Pagpapakatao 1')->get();
 //Grade2
        $g2MotherTongue2 = UserSchoolRelatedInfo::where('subjects','Mother Tongue 2')->get();
        $g2Filipino2 = UserSchoolRelatedInfo::where('subjects','Filipino 2')->get();
        $g2English2 = UserSchoolRelatedInfo::where('subjects','English 2')->get();
        $g2Math2= UserSchoolRelatedInfo::where('subjects','Math 2')->get();
        $g2Science2= UserSchoolRelatedInfo::where('subjects','Science 2')->get();
        $g2AralingPanlipunan2 = UserSchoolRelatedInfo::where('subjects','Araling Panlipunan 2')->get();
        $g2Mapeh2 = UserSchoolRelatedInfo::where('subjects','Mapeh 2')->get();
        $g2EdukasyonsaPagpapakatao2 = UserSchoolRelatedInfo::where('subjects','Edukasyon sa Pagpapakatao 2')->get();
//Grade3
        $g3MotherTongue3 = UserSchoolRelatedInfo::where('subjects','Mother Tongue 3')->get();
        $g3Filipino3 = UserSchoolRelatedInfo::where('subjects','Filipino 3')->get();
        $g3English3 = UserSchoolRelatedInfo::where('subjects','English 3')->get();
        $g3Math3= UserSchoolRelatedInfo::where('subjects','Math 3')->get();
        $g3Science3= UserSchoolRelatedInfo::where('subjects','Science 3')->get();
        $g3AralingPanlipunan3 = UserSchoolRelatedInfo::where('subjects','Araling Panlipunan 3')->get();
        $g3Mapeh3 = UserSchoolRelatedInfo::where('subjects','Mapeh 3')->get();
        $g3EdukasyonsaPagpapakatao3 = UserSchoolRelatedInfo::where('subjects','Edukasyon sa Pagpapakatao 3')->get();
//Grade4
        $g4Filipino4 = UserSchoolRelatedInfo::where('subjects','Filipino 4')->get();
        $g4English4 = UserSchoolRelatedInfo::where('subjects','English 4')->get();
        $g4Math4 = UserSchoolRelatedInfo::where('subjects','Math 4')->get();
        $g4Science4 = UserSchoolRelatedInfo::where('subjects','Science 4')->get();
        $g4AralingPanlipunan4 = UserSchoolRelatedInfo::where('subjects','Araling Panlipunan 4')->get();
        $g4Mapeh4 = UserSchoolRelatedInfo::where('subjects','Mapeh 4')->get();
        $g4EdukasyonsaPagpapakatao4 = UserSchoolRelatedInfo::where('subjects','Edukasyon sa Pagpapakatao 4')->get();
        $g4EdukasyongPantahananatPangkabuhayan4 = UserSchoolRelatedInfo::where('subjects','Edukasyong Pantahanan at Pangkabuhayan 4')->get();
//Grade5
        $g5Filipino5 = UserSchoolRelatedInfo::where('subjects','Filipino 5')->get();
        $g5English5 = UserSchoolRelatedInfo::where('subjects','English 5')->get();
        $g5Math5 = UserSchoolRelatedInfo::where('subjects','Math 5')->get();
        $g5Science5 = UserSchoolRelatedInfo::where('subjects','Science 5')->get();
        $g5AralingPanlipunan5 = UserSchoolRelatedInfo::where('subjects','Araling Panlipunan 5')->get();
        $g5Mapeh5 = UserSchoolRelatedInfo::where('subjects','Mapeh 5')->get();
        $g5EdukasyonsaPagpapakatao5 = UserSchoolRelatedInfo::where('subjects','Edukasyon sa Pagpapakatao 5')->get();
        $g5EdukasyongPantahananatPangkabuhayan5 = UserSchoolRelatedInfo::where('subjects','Edukasyong Pantahanan at Pangkabuhayan 5')->get();
        
        return view('ClassSchedules.create',compact('teachers','g1MotherTongue','g1Filipino1','g1English1','g1Math1','g1Science1','g1AralingPanlipunan1',
                    'g1Mapeh1','g1EdukasyonsaPagpapakatao1','g2MotherTongue2','g2Filipino2','g2English2','g2Math2','g2Science2','g2AralingPanlipunan2',
                    'g2Mapeh2','g2EdukasyonsaPagpapakatao2','g3MotherTongue3','g3Filipino3','g3English3','g3Math3','g3Science3','g3AralingPanlipunan3',
                    'g3Mapeh3','g3EdukasyonsaPagpapakatao3','g4Filipino4','g4English4','g4Math4','g4Science4','g4AralingPanlipunan4','g4Mapeh4','g4EdukasyonsaPagpapakatao4',
                'g4EdukasyongPantahananatPangkabuhayan4','g5Filipino5','g5English5','g5Math5','g5Science5','g5AralingPanlipunan5','g5Mapeh5','g5EdukasyonsaPagpapakatao5',
                'g5EdukasyongPantahananatPangkabuhayan5'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ClassSchedules::create([
            'gradeLevel' => $request->gradeLevel,
            'gradeLevelIcon' => $request->gradeLevelIcon,
            'section' => $request->section,
            'schoolYearFrom' => $request->schoolYearFrom,
            'schoolYearTo' => $request->schoolYearTo,
            'classAdviser' => $request->classAdviser,
            'notes' => $request->notes,
        ]);

        return redirect()->route('classSchedule.index')->with('success', 'Class Schedule Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('ClassSchedules.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('ClassSchedules.edit');
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

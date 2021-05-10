@extends('layouts.master')

@section('content')

@include('layouts.vtabStudent')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">My Class Schedule</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3 pt-3">
            <div class="row">
                <div class="col-sm-8">
                    <p class="p-0 m-0" style="color: #676767; font-weight: 800; letter-spacing: 1px; font-size: 25px">GRADE 1 (MABAIT) CLASS SCHEDULE</p>
                    <p class="p-0 m-0" style="color: #d11d27; font-size: 15px; letter-spacing: 1px; font-weight: 600">Schedule for AY 2020 - 2021</p>
                    <p class="p-0 m-0" style="color: #1e1e1e; font-size: 14px; letter-spacing: 1px; font-weight: 500">Ms. Aleli Santiago (Class Adviser)</p>
                </div>
                <div class="col-sm-4">
                    <div class="p-2" style="background: #fbebd8; min-height: 80px; border-radius: 5px">
                        <p class="p-0 m-0" style="color: #d11d27; font-size: 14px">Notes:</p>
                        <p class="pl-2 p-0 m-0 text-justify" style="color: #d11d27; font-size: 13px">Test</p>
                    </div>

                </div>
            </div>
            <div class="row p-3 mt-2">
                <!-- monday -->
                <div class="col-sm">
                    <div class="row p-3" style="background: #ebebeb">
                        <div class="col-sm-12">
                            <p class="text-center sub-title p-0 m-0">Monday</p>
                        </div>
                    </div>
                    <div class="row pb-2 mt-n2">
                        <div class="col-sm-12 pt-4" style="border-top: 1px solid #ebebeb">
                            <p class="text-center sub-title" style="color: #1e1e1e">Math 1
                            <small class="d-flex justify-content-center user-role">Aleli Santiago</small> 
                            <small class="d-flex justify-content-center user-role" style="color: #8cbd01">09:00 AM to 10:00 AM</small> 
                        </div>
                    </div>
                </div>
                <!-- tuesday -->
                <div class="col-sm">
                    <div class="row p-3" style="background: #ebebeb">
                        <div class="col-sm-12">
                            <p class="text-center sub-title p-0 m-0">Tuesday</p>
                        </div>
                    </div>
                    <div class="row pb-2 mt-n2">
                        <div class="col-sm-12 pt-4" style="border-top: 1px solid #ebebeb">
                            <p class="text-center sub-title" style="color: #1e1e1e">Math 1
                            <small class="d-flex justify-content-center user-role">Aleli Santiago</small> 
                            <small class="d-flex justify-content-center user-role" style="color: #8cbd01">09:00 AM to 10:00 AM</small> 
                        </div>
                    </div>
                </div>
                <!-- wednesday -->
                <div class="col-sm">
                    <div class="row p-3" style="background: #ebebeb">
                        <div class="col-sm-12">
                            <p class="text-center sub-title p-0 m-0">Wednesday</p>
                        </div>
                    </div>
                    <div class="row pb-2 mt-n2">
                        <div class="col-sm-12 pt-4" style="border-top: 1px solid #ebebeb">
                            <p class="text-center sub-title" style="color: #1e1e1e">Math 1
                            <small class="d-flex justify-content-center user-role">Aleli Santiago</small> 
                            <small class="d-flex justify-content-center user-role" style="color: #8cbd01">09:00 AM to 10:00 AM</small> 
                        </div>
                    </div>
                </div>
                <!-- thursday -->
                <div class="col-sm">
                    <div class="row p-3" style="background: #ebebeb">
                        <div class="col-sm-12">
                            <p class="text-center sub-title p-0 m-0">Thursday</p>
                        </div>
                    </div>
                    <div class="row pb-2 mt-n2">
                        <div class="col-sm-12 pt-4" style="border-top: 1px solid #ebebeb">
                            <p class="text-center sub-title" style="color: #1e1e1e">Math 1
                            <small class="d-flex justify-content-center user-role">Aleli Santiago</small> 
                            <small class="d-flex justify-content-center user-role" style="color: #8cbd01">09:00 AM to 10:00 AM</small> 
                        </div>
                    </div>
                </div>
                <!-- friday -->
                <div class="col-sm">
                    <div class="row p-3" style="background: #ebebeb">
                        <div class="col-sm-12">
                            <p class="text-center sub-title p-0 m-0">Friday</p>
                        </div>
                    </div>
                    <div class="row pb-2 mt-n2">
                        <div class="col-sm-12 pt-4" style="border-top: 1px solid #ebebeb">
                            <p class="text-center sub-title" style="color: #1e1e1e">Math 1
                            <small class="d-flex justify-content-center user-role">Aleli Santiago</small> 
                            <small class="d-flex justify-content-center user-role" style="color: #8cbd01">09:00 AM to 10:00 AM</small> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

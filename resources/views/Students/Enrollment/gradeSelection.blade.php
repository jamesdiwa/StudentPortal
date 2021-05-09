@extends('layouts.master')

@section('content')

<?php Session::put('vtab', 'students'); ?>

<style>
    .fc-content{
        /* background: #a90011; */
        color: #ffffff;
    }
    /* .fc-event{
        border: 1px solid #a90011;
    } */
    .student-select{
        border: 3px solid #d11d27; 
        height: 200px; 
        border-radius: 5px; 
        width: 75%; 
        background: none;
    }
</style>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg"  style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title d-inline"><a href="/students" style="color: white"><i class="fas fa-arrow-left"></i></a> Enrollment</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3">
            <div class="px-2 py-4">
                <div class="row">
                    <div class="col-sm-4 d-flex justify-content-center mt-3">
                        <button type="button" class="student-select" onclick="window.location='{{ route('Grade1Index') }}'">
                            <div class="d-flex justify-content-center pb-3">
                            <p class="text-center p-0 m-0" style="font-size: 60px; font-weight: 800; color: #d11d27">G-1</p>
                            </div>
                            <p class="text-center header-title" style="color: #d11d27">Grade 1</p>
                        </button>
                    </div>
                    <div class="col-sm-4 d-flex justify-content-center mt-3">
                        <button type="button" class="student-select" onclick="window.location='{{ route('Grade2Index') }}'">
                            <div class="d-flex justify-content-center pb-3">
                            <p class="text-center p-0 m-0" style="font-size: 60px; font-weight: 800; color: #d11d27">G-2</p>
                            </div>
                            <p class="text-center header-title" style="color: #d11d27">Grade 2</p>
                        </button>
                    </div>
                    <div class="col-sm-4 d-flex justify-content-center mt-3">
                        <button type="button" class="student-select" onclick="window.location='{{ route('Grade3Index') }}'">
                            <div class="d-flex justify-content-center pb-3">
                            <p class="text-center p-0 m-0" style="font-size: 60px; font-weight: 800; color: #d11d27">G-3</p>
                            </div>
                            <p class="text-center header-title" style="color: #d11d27">Grade 3</p>
                        </button>
                    </div>
                    <div class="col-sm-4 d-flex justify-content-center mt-3">
                        <button type="button" class="student-select" onclick="window.location='{{ route('Grade4Index') }}'">
                            <div class="d-flex justify-content-center pb-3">
                            <p class="text-center p-0 m-0" style="font-size: 60px; font-weight: 800; color: #d11d27">G-4</p>
                            </div>
                            <p class="text-center header-title" style="color: #d11d27">Grade 4</p>
                        </button>
                    </div>
                    <div class="col-sm-4 d-flex justify-content-center mt-3">
                        <button type="button" class="student-select" onclick="window.location='{{ route('Grade5Index') }}'">
                            <div class="d-flex justify-content-center pb-3">
                            <p class="text-center p-0 m-0" style="font-size: 60px; font-weight: 800; color: #d11d27">G-5</p>
                            </div>
                            <p class="text-center header-title" style="color: #d11d27">Grade 5</p>
                        </button>
                    </div>
                    <div class="col-sm-4 d-flex justify-content-center mt-3">
                        <button type="button" class="student-select" onclick="window.location='{{ route('Grade6Index') }}'">
                            <div class="d-flex justify-content-center pb-3">
                            <p class="text-center p-0 m-0" style="font-size: 60px; font-weight: 800; color: #d11d27">G-6</p>
                            </div>
                            <p class="text-center header-title" style="color: #d11d27">Grade 6</p>
                        </button>
                    </div>
                    <div class="col-sm-4 d-flex justify-content-center mt-3">
                        <button type="button" class="student-select" onclick="window.location='{{ route('Grade7Index') }}'">
                            <div class="d-flex justify-content-center pb-3">
                            <p class="text-center p-0 m-0" style="font-size: 60px; font-weight: 800; color: #d11d27">G-7</p>
                            </div>
                            <p class="text-center header-title" style="color: #d11d27">Grade 7</p>
                        </button>
                    </div>
                    <div class="col-sm-4 d-flex justify-content-center mt-3">
                        <button type="button" class="student-select" onclick="window.location='{{ route('Grade8Index') }}'">
                            <div class="d-flex justify-content-center pb-3">
                            <p class="text-center p-0 m-0" style="font-size: 60px; font-weight: 800; color: #d11d27">G-8</p>
                            </div>
                            <p class="text-center header-title" style="color: #d11d27">Grade 8</p>
                        </button>
                    </div>
                    <div class="col-sm-4 d-flex justify-content-center mt-3">
                        <button type="button" class="student-select" onclick="window.location='{{ route('Grade9Index') }}'">
                            <div class="d-flex justify-content-center pb-3">
                            <p class="text-center p-0 m-0" style="font-size: 60px; font-weight: 800; color: #d11d27">G-9</p>
                            </div>
                            <p class="text-center header-title" style="color: #d11d27">Grade 9</p>
                        </button>
                    </div>
                    <div class="col-sm-4 d-flex justify-content-center mt-3">
                        <button type="button" class="student-select" onclick="window.location='{{ route('Grade10Index') }}'">
                            <div class="d-flex justify-content-center pb-3">
                            <p class="text-center p-0 m-0" style="font-size: 60px; font-weight: 800; color: #d11d27">G-10</p>
                            </div>
                            <p class="text-center header-title" style="color: #d11d27">Grade 10</p>
                        </button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection
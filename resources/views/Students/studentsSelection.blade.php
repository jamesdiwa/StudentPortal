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
            <p class="header-title">Students</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3">
            <div class="px-2 py-4">
                <div class="row">
                    <div class="col-sm-6 d-flex justify-content-center">
                        <button type="button" class="student-select" onclick="window.location='{{ route('newStudent.index') }}'">
                            <div class="d-flex justify-content-center pb-3">
                                <i class="far fa-file-alt" style="font-size: 60px; color: #d11d27"></i>
                            </div>
                            <p class="text-center header-title" style="color: #d11d27">Newly Registered Students</p>
                        </button>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-center">
                        <button type="button" class="student-select" onclick="window.location='{{ route('studentList.index') }}'">
                            <div class="d-flex justify-content-center pb-3">
                                <i class="fas fa-file-alt" style="font-size: 60px; color: #d11d27"></i>
                            </div>
                            <p class="text-center header-title" style="color: #d11d27">Student List</p>
                        </button>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-6 d-flex justify-content-center">
                        <button type="button" class="student-select" onclick="window.location='{{ route('accounting.index') }}'">
                            <div class="d-flex justify-content-center pb-3">
                                <i class="fas fa-file-invoice-dollar" style="font-size: 60px; color: #d11d27"></i>
                            </div>
                            <p class="text-center header-title" style="color: #d11d27">Accounting</p>
                        </button>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-center">
                        <button type="button" class="student-select" onclick="window.location='{{ route('grading.index') }}'">
                            <div class="d-flex justify-content-center pb-3">
                                <i class="fas fa-calculator" style="font-size: 60px; color: #d11d27"></i>
                            </div>
                            <p class="text-center header-title" style="color: #d11d27">Grading Administration</p>
                        </button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<script>

    $(document).ready( function () {
    $('#TblSorter1').DataTable();
    });

</script>

@endsection
@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">Student Information</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3 py-3"> 
            <!-- Basic Info -->
            <p class="DivHeaderText mb-2 pb-2">BASIC INFORMATION</p>
            <div class="row">
                <div class="col-sm-4">
                    <label class="label">First Name</label>
                    <p class="data pl-3">{{$student->firstName}} </p>
                </div>
                <div class="col-sm-4">
                    <label class="label">Middle Name</label>
                    <p class="data pl-3">{{$student->middleName}}</p>
                </div>
                <div class="col-sm-4">
                    <label class="label">Last Name</label>
                    <p class="data pl-3">{{$student->lastName}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <label class="label">Date of Birth</label>
                    <p class="data pl-3">{{$student->month}} {{$student->day}},{{$student->year}}</p>
                </div>
                <div class="col-sm-4">
                    <label class="label">Gender</label>
                    <p class="data pl-3">{{$student->gender}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="label">Permanent Address</label>
                    <p class="data pl-3">{{$student->permanentAddress}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="label">Present Address</label>
                    <p class="data pl-3">{{$student->presentAddress}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label class="label">Email Address</label>
                    <p class="data pl-3">{{$student->email}}</p>
                </div>
                <div class="col-sm-6">
                    <label class="label">Contact Number</label>
                    <p class="data pl-3">{{$student->contactNumber}}</p>
                </div>
            </div>
            <hr>
            <!-- Guardian Details -->
            <p class="DivHeaderText my-2 py-2">GUARDIAN INFORMATION</p>
            <div class="row">
                <div class="col-sm-4">
                    <label class="label">First Name</label>
                    <p class="data pl-3">{{$student->studentGuardian->gFirstName}}</p>
                </div>
                <div class="col-sm-4">
                    <label class="label">Middle Name</label>
                    <p class="data pl-3">{{$student->studentGuardian->gMiddleName}}</p>
                </div>
                <div class="col-sm-4">
                    <label class="label">Last Name</label>
                    <p class="data pl-3">{{$student->studentGuardian->gLastname}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="label">Relationship</label>
                    <p class="data pl-3">{{$student->studentGuardian->gRelationship}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="label">Complete Address</label>
                    <p class="data pl-3">{{$student->studentGuardian->gCompleteAddress}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="label">Contact Number</label>
                    <p class="data pl-3">{{$student->studentGuardian->gContactNumber}}</p>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="button" class="edit-button"  onclick="window.location='{{ route('newStudent.edit',$student->id) }}'">Enlist</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('newStudent.index') }}'">Back</button>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
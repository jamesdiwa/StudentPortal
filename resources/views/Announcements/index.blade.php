@extends('layouts.master')

@section('content')

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title d-inline">School Announcements</p>
            <button class="float-right create-button" onclick="window.location='{{ route('announcement.create')  }}'">Create</button>
        </div>
    </div>
    <div class="container">       
        <div class="DivTemplate mt-3 py-4">
            <button type="button" class="delete-button float-right mx-1">Delete</button>
            <button type="button" class="update-button float-right mx-1">Update</button>
            <div class="row mt-2">
                <div class="col-sm-12">
                    <p class="p-0 m-0 data">Lorem Ipsum (From 04/20/2021 to 04/21/2021)</p>
                    <p class="label">Lorem Ipsum Dolor. Lorem Ipsum Dolor. Lorem Ipsum Dolor. Lorem Ipsum Dolor. Lorem Ipsum Dolor. </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
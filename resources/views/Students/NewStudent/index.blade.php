@extends('layouts.master')

@section('content')

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title"><a href="/students" style="color: white"><i class="fas fa-arrow-left"></i></a> Newly Registered Students</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3">
            <div class="form-row row mt-3">
                <div class="form-group col-sm">
                    <input type="text" name="search" class="form-control searchbar" name="search" placeholder="Search">   
                </div>
                <div class="form-group col-sm-auto">
                    <button type="submit" class="search-button" style="padding-top: 8.7px; padding-bottom: 8.7px;">Search</button>      
                </div>
            </div>
            <table class="table table-borderless">
                <thead class="thead-bg">
                    <th width="500px">Student Name</th>
                    <th width="350px" class="text-center">Action</th>
                </thead>
                <tbody class="tbody-data">
                    <tr>
                        <td class="align-middle">James Patrick Diwa</td>
                        <td class="text-center">
                            <button style="button" class="search-button mx-1" onclick="window.location='{{ url('newStudent-show') }}'">View</button>
                            <button style="button" class="update-button mx-1" onclick="window.location='{{ url('enlist-student') }}'">Enlist</button>
                            <button style="button" class="delete-button mx-1">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
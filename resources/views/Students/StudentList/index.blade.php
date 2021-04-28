@extends('layouts.master')

@section('content')

<style>
    .fc-content{
        /* background: #a90011; */
        color: #ffffff;
    }
    /* .fc-event{
        border: 1px solid #a90011;
    } */
    #grade_div, #section_div {
        display: none;
    }
</style>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title d-inline"><a href="/students" style="color: white"><i class="fas fa-arrow-left"></i></a> Student List</p>
            <button class="float-right create-button" onclick="window.location='{{ route('studentList.create')  }} '">Create</button>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3">
            <div class="form-row row mt-3">
                <div class="form-group col-sm">
                    <label class="p-0 m-0 sub-title">Search</label>
                    <input type="text" name="search" class="form-control searchbar" name="search" placeholder="Search">   
                </div>
                <div class="form-group col-sm-4">
                    <label class="p-0 m-0 sub-title">Filter by</label>
                    <select name="" id="" class="form-control" style="background: #fbebd8; color: #A90011; border: none; font-weight: 600;">
                        <option value="0">All</option>
                        <option value="1">Registered</option>
                        <option value="2">Enrolled</option>
                        <option value="3">Completed</option>
                        <option value="4">Dropped</option>
                        <option value="2">Transferred</option>
                        <option value="2">Graduated</option>
                    </select>
                </div>
                <div class="form-group col-sm-auto">
                    <br>
                    <button type="submit" class="search-button" style="padding-top: 8.7px; padding-bottom: 8.7px;">Search</button>      
                </div>
            </div>
            <table class="table table-borderless">
                <thead class="thead-bg">
                    <th width="100px">Student ID</th>
                    <th width="200px">Student Name</th>
                    <th width="150px">Status</th>
                    <th width="200px" class="text-center">Action</th>
                </thead>
                <tbody class="tbody-data">
                    <tr>
                        <td class="align-middle">A117A0909</td>
                        <td class="align-middle">James Patrick Diwa</td>
                        <td class="align-middle"><span style="color: #097b9e">Registered</span></td>
                        <td class="text-center">
                            <button style="button" class="search-button" onclick="window.location='{{ url('studentList-show') }}'">Records</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">A117A0909</td>
                        <td class="align-middle">James Patrick Diwa</td>
                        <td class="align-middle"><span style="color: #8cbd01">Enrolled as Grade 7</span></td>
                        <td class="text-center">
                            <button style="button" class="search-button" onclick="window.location='{{ url('studentList-show') }}'">Records</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">A117A0909</td>
                        <td class="align-middle">James Patrick Diwa</td>
                        <td class="align-middle"><span style="color: #097b9e">Completed Grade 6</span></td>
                        <td class="text-center">
                            <button style="button" class="search-button">Records</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">A117A0909</td>
                        <td class="align-middle">James Patrick Diwa</td>
                        <td class="align-middle"><span style="color: red">Dropped</span></td>
                        <td class="text-center">
                            <button style="button" class="search-button">Records</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">A117A0909</td>
                        <td class="align-middle">James Patrick Diwa</td>
                        <td class="align-middle"><span style="color: #de6600">Transferred</span></td>
                        <td class="text-center">
                            <button style="button" class="search-button">Records</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">A117A0909</td>
                        <td class="align-middle">James Patrick Diwa</td>
                        <td class="align-middle"><span style="color: #1e1e1e">Graduated</span></td>
                        <td class="text-center">
                            <button style="button" class="search-button">Records</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
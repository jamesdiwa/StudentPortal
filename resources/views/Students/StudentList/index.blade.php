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
                <div class="form-group col-sm-12">
                    <input type="text" id="search" class="form-control searchbar" name="search" placeholder="Search...">   
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
                    @foreach($students as $student)
                    <tr class="students {{strtolower($student->firstName)}}{{strtolower($student->middleName)}}{{strtolower($student->lastName)}} {{strtolower($student->firstName)}} {{strtolower($student->middleName)}} {{strtolower($student->lastName)}}">
                        <td class="align-middle">{{$student->username}}</td>
                        <td class="align-middle">{{$student->firstName}} {{$student->middleName}} {{$student->lastName}}</td>
                        <td class="align-middle"><span style="color: #097b9e">{{$student->status}}</span></td>
                        <td class="text-center">
                            <button style="button" class="search-button" onclick="window.location='{{ route('studentList.show',$student->id)}}'">Records</button>
                        </td>
                    </tr>
                    @endforeach

                    {{-- <tr>
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
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>

    
$(document).ready(function(){

    $('#search').change(function(){
        if($('#search').val() != ""){
                var name = $('#search').val().split(" ").join("").toLowerCase();
                $('.students').hide();
                $('.'+name).show();
            }else{
                $('.students').show();
            }
    
    });

});


    var msg = "{{Session::get('success')}}";
    var exist = "{{Session::has('success')}}";
    if(exist){
        Swal.fire({
            icon: 'success',
            title: msg,
            showConfirmButton: false,
            timer: 2000,
        });
    }
</script>
@endsection
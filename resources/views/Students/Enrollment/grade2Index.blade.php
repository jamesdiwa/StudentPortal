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
            <p class="header-title d-inline"><a href="/gradeSelection" style="color: white"><i class="fas fa-arrow-left"></i></a> Grade 2 Enrollment</p>
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
                        <option value="1">Enrolled</option>
                        <option value="2">Not yet enrolled</option>
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
                @foreach ($students as $student)
                    @if($student->grade2 == 'Enrolled')
                         <tr>
                             <td class="align-middle">{{$student->username}}</td>
                             <td class="align-middle">{{$student->firstName}} {{$student->middleName}} {{$student->lastName}}</td>
                     
                             <td class="align-middle"><span style="color: #8cbd01">Enrolled</span></td>
                             <td class="text-center">
                                    <form class="form-horizontal" method="POST" action="{{route('enrollShow')}}">
                                        @csrf
                                        <input type="hidden" value="{{$student->id}}" name="studentId">
                                        <input type="hidden" value="Grade 2" name="gradeLevel">
                                        <button type="submit" class="search-button" >Records</button>
                                    </form>
                             </td>
                         </tr>
                     @elseif($student->grade2 == 'Not yet enrolled')
                         <tr>
                             <td class="align-middle">{{$student->username}}</td>
                             <td class="align-middle">{{$student->firstName}} {{$student->middleName}} {{$student->lastName}}</td>
                             <td class="align-middle"><span style="color: red">Not yet enrolled</span></td>
                             <td class="text-center">
                                 <form class="form-horizontal" method="POST" action="{{route('enrollCreate')}}">
                                     @csrf
                                     <input type="hidden" value="{{$student->id}}" name="studentId">
                                     <input type="hidden" value="Grade 2" name="gradeLevel">
                                     <button type="submit" class="update-button" >Enroll</button>
                                 </form>
                             </td>
                         </tr>
                     @endif
                 @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



<script>
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
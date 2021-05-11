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
            <p class="header-title d-inline"><a href="/gradeSelection" style="color: white"><i class="fas fa-arrow-left"></i></a> Grade 6 Enrollment</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3">
            <div class="form-row row mt-3">
                <div class="form-group col-sm">
                    <label class="p-0 m-0 sub-title">Search</label>
                    <input type="text" id="search" class="form-control searchbar" name="search" placeholder="Search">   
                </div>
                <div class="form-group col-sm-4">
                    <label class="p-0 m-0 sub-title">Filter by</label>
                    <select name="filterBy" id="filterBy" class="form-control" style="background: #fbebd8; color: #A90011; border: none; font-weight: 600;">
                        <option value="All">All</option>
                        <option value="Enrolled">Enrolled</option>
                        <option value="Not yet enrolled">Not yet enrolled</option>
                    </select>
                </div>
                {{-- <div class="form-group col-sm-auto">
                    <br>
                    <button type="submit" class="search-button" style="padding-top: 8.7px; padding-bottom: 8.7px;">Search</button>      
                </div> --}}
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
                    @if($student->grade6 == 'Enrolled')
                    <tr class="Enrolled allRow  {{strtolower($student->username)}} {{strtolower($student->firstName)}} {{strtolower($student->middleName)}} {{strtolower($student->lastName)}}  {{strtolower($student->firstName)}}{{strtolower($student->middleName)}}{{strtolower($student->lastName)}}">
                             <td class="align-middle">{{$student->username}}</td>
                             <td class="align-middle">{{$student->firstName}} {{$student->middleName}} {{$student->lastName}}</td>
                     
                             <td class="align-middle"><span style="color: #8cbd01">Enrolled</span></td>
                             <td class="text-center">
                                    <form class="form-horizontal" method="POST" action="{{route('enrollShow')}}">
                                        @csrf
                                        <input type="hidden" value="{{$student->id}}" name="studentId">
                                        <input type="hidden" value="Grade 6" name="gradeLevel">
                                        <button type="submit" class="search-button" >Records</button>
                                    </form>
                             </td>
                         </tr>
                     @elseif($student->grade6 == 'Not yet enrolled')
                     <tr class="Notyetenrolled allRow {{strtolower($student->username)}} {{strtolower($student->firstName)}} {{strtolower($student->middleName)}} {{strtolower($student->lastName)}}  {{strtolower($student->firstName)}}{{strtolower($student->middleName)}}{{strtolower($student->lastName)}}">
                             <td class="align-middle">{{$student->username}}</td>
                             <td class="align-middle">{{$student->firstName}} {{$student->middleName}} {{$student->lastName}}</td>
                             <td class="align-middle"><span style="color: red">Not yet enrolled</span></td>
                             <td class="text-center">
                                 <form class="form-horizontal" method="POST" action="{{route('enrollCreate')}}">
                                     @csrf
                                     <input type="hidden" value="{{$student->id}}" name="studentId">
                                     <input type="hidden" value="Grade 6" name="gradeLevel">
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

     $(document).ready(function(){

        $('#filterBy').change(function(){
            if($('#search').val() != ""){
                Search();
            }else{
                FilterBy();
            }
        });

        $('#search').change(function(){
            if($('#search').val() != ""){
                Search();
            }else{
                FilterBy();
            }
        });

    });

    function Search(){

        if($('#filterBy').val() == "Enrolled"){
            var name = $('#search').val().split(" ").join("").toLowerCase();
            $('.allRow').hide();
            $('.'+name).show();
            $('.Notyetenrolled').hide();
        }else if($('#filterBy').val() == "Not yet enrolled"){
            var name = $('#search').val().split(" ").join("").toLowerCase();
            $('.allRow').hide();
            $('.'+name).show();
            $('.Enrolled').hide();
        }else{
            var name = $('#search').val().split(" ").join("").toLowerCase();
            $('.allRow').hide();
            $('.'+name).show();
        }   
    }

    function FilterBy(){
        if($('#filterBy').val() == "Enrolled"){
            $('.allRow').hide();
            $('.Enrolled').show();
        }else if($('#filterBy').val() == "Not yet enrolled"){
            $('.allRow').hide();
            $('.Notyetenrolled').show();
        }else{
            $('.allRow').show();
        }
    }


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
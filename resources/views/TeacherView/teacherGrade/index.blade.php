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
@include('layouts.vtabTeacher')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">Grading Administration</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3">
            <div class="form-row row mt-3">
                {{-- <div class="form-group col-sm">
                    <label class="p-0 m-0 sub-title">Search</label>
                    <input type="text" name="search" class="form-control searchbar" name="search">   
                </div>
                <div class="form-group col-sm-4">
                    <label class="p-0 m-0 sub-title">Subject</label>
                    <select name="" id="" class="form-control" style="background: #fbebd8; color: #A90011; border: none; font-weight: 600; ">
                        <option value="">All</option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group col-sm-auto">
                    <br>
                    <button type="submit" class="search-button" style="padding-top: 8.7px; padding-bottom: 8.7px;">Search</button>      
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <button class="update-button float-right" style="width: 200px; padding-top: 8.7px; padding-bottom: 8.7px;" id="uploadBySection">Upload Grades by Section</button>
                </div>
            </div> --}}
            <table class="table table-borderless">
                <thead class="thead-bg">
                    <th width="100px">Subject</th>
                    <th width="200px" class="text-center">Action</th>
                </thead>
                <tbody class="tbody-data">

                    @foreach ($teacherSubject as $teacherSubject)
                        <tr>
                            <td class="align-middle">{{$teacherSubject->subjects}}</td>
                            <td class="text-center">
                                <form class="form-horizontal" method="POST" action="{{route('classIndex')}}">
                                    @csrf
                                    <input type="hidden" name="subject" value="{{$teacherSubject->subjects}}">
                                   <button style="button" class="search-button" type="submit">Records</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal modal-location fade bd-example-modal-md mt-5" id="selectGrade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content pt-4 pb-2">
            <div class="px-4">
                <p class=" modal-title DivHeaderText d-inline" style="font-size: 16px; letter-spacing: 1px; font-weight: 500">SUPPLY NECESSARY INFORMATION</p>
            </div>
            <div class="modal-body">
                <div class="pt-2 px-2 pb-0">
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label class="input-label">Grade Level</label>
                            <select name="gradeLevel" id="gradeLevel" class="form-control" required>
                                <option value="">Select</option>
                                <option value="Grade 1" data-icon="G-1">Grade 1</option>
                                <option value="Grade 2" data-icon="G-2">Grade 2</option>
                                <option value="Grade 3" data-icon="G-3">Grade 3</option>
                                <option value="Grade 4" data-icon="G-4">Grade 4</option>
                                <option value="Grade 5" data-icon="G-5">Grade 5</option>
                                <option value="Grade 6" data-icon="G-6">Grade 6</option>
                                <option value="Grade 7" data-icon="G-7">Grade 7</option>
                                <option value="Grade 8" data-icon="G-8">Grade 8</option>
                                <option value="Grade 9" data-icon="G-9">Grade 9</option>
                                <option value="Grade 10" data-icon="G-10">Grade 10</option>
                            </select>
                            <input type="hidden" value="" name="gradeLevelIcon" id="gradeLevelIcon">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label class="input-label">Section</label>
                            <select name="" id="" class="form-control" required>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label class="input-label">Subject</label>
                            <select name="" id="" class="form-control" required>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="button" class="save-button" onclick="window.location='{{ url('/gradingBySection') }}'">Proceed</button>
                    <button type="button" id="cancel" class="back-button float-right">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showDiv(select){
     if(select.value==1){
      document.getElementById('grade_div').style.display = "block";
      document.getElementById('section_div').style.display = "block";
     }
     else {
      document.getElementById('grade_div').style.display = "none";
      document.getElementById('section_div').style.display = "none";
     }
  } 
    $('#uploadBySection').click(function(){
        $('#selectGrade').modal('show');
    });
    $('#cancel').click(function(){
        $('#selectGrade').modal('hide');
    }); 
  </script>
@endsection
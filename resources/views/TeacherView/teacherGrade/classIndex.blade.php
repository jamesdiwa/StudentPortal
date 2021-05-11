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
            <p class="header-title d-inline"><a href="{{ url('gradingIndex') }}" style="color: white"><i class="fas fa-arrow-left"></i></a> My Class List</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3">
            <div class="form-row row mt-3">
                <div class="form-group col-sm">
                    <label class="p-0 m-0 sub-title">Search</label>
                    <input type="text" id="search" class="form-control searchbar" name="search">   
                </div>
                <div class="form-group col-sm-4">
                    <label class="p-0 m-0 sub-title">Filter by</label>
                    <select name="" id="filterBy" class="form-control" style="background: #fbebd8; color: #A90011; border: none; font-weight: 600; ">
                        <option value="">All</option>
                        <option value="Grade1">Grade 1</option>
                        <option value="Grade2">Grade 2</option>
                        <option value="Grade3">Grade 3</option>
                        <option value="Grade4">Grade 4</option>
                        <option value="Grade5">Grade 5</option>
                        <option value="Grade6">Grade 6</option>
                        <option value="Grade7">Grade 7</option>
                        <option value="Grade8">Grade 8</option>
                        <option value="Grade9">Grade 9</option>
                        <option value="Grade10">Grade 10</option>
                    </select>
                </div>
                {{-- <div class="form-group col-sm-auto">
                    <br>
                    <button type="submit" class="search-button" style="padding-top: 8.7px; padding-bottom: 8.7px;">Search</button>      
                </div> --}}
            </div>
            
            
            <div class="row mx-3 py-2">   
                @foreach($classSchedules as $classSchedules)    

                <a style="cursor: pointer" onclick="submitForm(this)" data-id="{{$classSchedules->id}}" class="userSelection {{strtolower($classSchedules->section)}} {{str_replace(' ', '', $classSchedules->gradeLevel)}} {{str_replace(' ', '', $classSchedules->section)}}">
                <div class="col-md-auto zoom">
                        <p class="text-center p-0 m-0" style="font-size: 60px; font-weight: 800; color: #d11d27">{{$classSchedules->gradeLevelIcon}}</p>
                        <p class="mt-1 DivHeaderText text-center user-name">{{$classSchedules->gradeLevel}}</p>
                        <small class="d-flex justify-content-center user-role">{{$classSchedules->section}}</small>    
                </div>
                </a>
                @endforeach
            </div>


<form class="form-horizontal" method="POST" action="{{route('classStudents')}}" id="formSubmit">
        @csrf
        <input type="hidden" name="classSchedId" id="classSchedId" >
        <input type="hidden" name="subject" id="" value="{{$subject}}" >
</form>


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


    function submitForm(thisAnchor){
        $('#classSchedId').val($(thisAnchor).attr('data-id'));
        $('#formSubmit').submit();
    }


    function Search(){
        if($('#filterBy').val() == "Grade1"){
            var name = $('#search').val().split(" ").join("").toLowerCase();
                    $('.userSelection').hide();
                    $('.'+name).show();
                    $('.Grade2').hide();
                    $('.Grade3').hide();
                    $('.Grade4').hide();
                    $('.Grade5').hide();
                    $('.Grade6').hide();
                    $('.Grade7').hide();
                    $('.Grade8').hide();
                    $('.Grade9').hide();
                    $('.Grade10').hide();
                    
                }else if($('#filterBy').val() == "Grade2"){
                    var name = $('#search').val().split(" ").join("").tolowercase();
                    $('.userSelection').hide();
                    $('.'+name).show();
                    $('.Grade1').hide();
                    $('.Grade3').hide();
                    $('.Grade4').hide();
                    $('.Grade5').hide();
                    $('.Grade6').hide();
                    $('.Grade7').hide();
                    $('.Grade8').hide();
                    $('.Grade9').hide();
                    $('.Grade10').hide();

                }else if($('#filterBy').val() == "Grade3"){
                    var name = $('#search').val().split(" ").join("").tolowercase();
                    $('.userSelection').hide();
                    $('.'+name).show();
                    $('.Grade1').hide();
                    $('.Grade2').hide();
                    $('.Grade4').hide();
                    $('.Grade5').hide();
                    $('.Grade6').hide();
                    $('.Grade7').hide();
                    $('.Grade8').hide();
                    $('.Grade9').hide();
                    $('.Grade10').hide();

                }else if($('#filterBy').val() == "Grade4"){
                    var name = $('#search').val().split(" ").join("").tolowercase();
                    $('.userSelection').hide();
                    $('.'+name).show();
                    $('.Grade1').hide();
                    $('.Grade2').hide();
                    $('.Grade3').hide();
                    $('.Grade5').hide();
                    $('.Grade6').hide();
                    $('.Grade7').hide();
                    $('.Grade8').hide();
                    $('.Grade9').hide();
                    $('.Grade10').hide();

                }else if($('#filterBy').val() == "Grade5"){
                    var name = $('#search').val().split(" ").join("").tolowercase();
                    $('.userSelection').hide();
                    $('.'+name).show();
                    $('.Grade1').hide();
                    $('.Grade2').hide();
                    $('.Grade3').hide();
                    $('.Grade4').hide();
                    $('.Grade6').hide();
                    $('.Grade7').hide();
                    $('.Grade8').hide();
                    $('.Grade9').hide();
                    $('.Grade10').hide();

                }else if($('#filterBy').val() == "Grade6"){
                    var name = $('#search').val().split(" ").join("").tolowercase();
                    $('.userSelection').hide();
                    $('.'+name).show();
                    $('.Grade1').hide();
                    $('.Grade2').hide();
                    $('.Grade3').hide();
                    $('.Grade4').hide();
                    $('.Grade5').hide();
                    $('.Grade7').hide();
                    $('.Grade8').hide();
                    $('.Grade9').hide();
                    $('.Grade10').hide();

                }else if($('#filterBy').val() == "Grade7"){
                    var name = $('#search').val().split(" ").join("").tolowercase();
                    $('.userSelection').hide();
                    $('.'+name).show();
                    $('.Grade1').hide();
                    $('.Grade2').hide();
                    $('.Grade3').hide();
                    $('.Grade4').hide();
                    $('.Grade5').hide();
                    $('.Grade6').hide();
                    $('.Grade8').hide();
                    $('.Grade9').hide();
                    $('.Grade10').hide();

                }else if($('#filterBy').val() == "Grade8"){
                    var name = $('#search').val().split(" ").join("").tolowercase();
                    $('.userSelection').hide();
                    $('.'+name).show();
                    $('.Grade1').hide();
                    $('.Grade2').hide();
                    $('.Grade3').hide();
                    $('.Grade4').hide();
                    $('.Grade5').hide();
                    $('.Grade6').hide();
                    $('.Grade7').hide();
                    $('.Grade9').hide();
                    $('.Grade10').hide();

                }else if($('#filterBy').val() == "Grade9"){
                    var name = $('#search').val().split(" ").join("").tolowercase();
                    $('.userSelection').hide();
                    $('.'+name).show();
                    $('.Grade1').hide();
                    $('.Grade2').hide();
                    $('.Grade3').hide();
                    $('.Grade4').hide();
                    $('.Grade5').hide();
                    $('.Grade6').hide();
                    $('.Grade7').hide();
                    $('.Grade8').hide();
                    $('.Grade10').hide();

                }else if($('#filterBy').val() == "Grade10"){
                    var name = $('#search').val().split(" ").join("").tolowercase();
                    $('.userSelection').hide();
                    $('.'+name).show();
                    $('.Grade1').hide();
                    $('.Grade2').hide();
                    $('.Grade3').hide();
                    $('.Grade4').hide();
                    $('.Grade5').hide();
                    $('.Grade6').hide();
                    $('.Grade7').hide();
                    $('.Grade8').hide();
                    $('.Grade9').hide();

            }else{
                var name = $('#search').val().split(" ").join("").toLowerCase();
                    $('.userSelection').hide();
                    $('.'+name).show();
            }
    }

    function FilterBy(){
        if($('#filterBy').val() == "Grade1"){
                $('.userSelection').hide();
                $('.Grade1').show();
            }else if($('#filterBy').val() == "Grade2"){
                $('.userSelection').hide();
                $('.Grade2').show();
            }else if($('#filterBy').val() == "Grade3"){
                $('.userSelection').hide();
                $('.Grade3').show();
            }else if($('#filterBy').val() == "Grade4"){
                $('.userSelection').hide();
                $('.Grade4').show();
            }else if($('#filterBy').val() == "Grade5"){
                $('.userSelection').hide();
                $('.Grade5').show();
            }else if($('#filterBy').val() == "Grade6"){
                $('.userSelection').hide();
                $('.Grade6').show();
            }else if($('#filterBy').val() == "Grade7"){
                $('.userSelection').hide();
                $('.Grade7').show();
            }else if($('#filterBy').val() == "Grade8"){
                $('.userSelection').hide();
                $('.Grade8').show();
            }else if($('#filterBy').val() == "Grade9"){
                $('.userSelection').hide();
                $('.Grade9').show();
            }else if($('#filterBy').val() == "Grade10"){
                $('.userSelection').hide();
                $('.Grade10').show();
            }else{
                $('.userSelection').show();
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

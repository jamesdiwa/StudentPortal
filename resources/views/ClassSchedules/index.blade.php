@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title d-inline">Class Schedules</p>
            <button class="float-right create-button" onclick="window.location='{{ route('classSchedule.create')}} '">Create</button>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3">
            <div class="form-row row mt-3">
                <div class="form-group col-sm">
                    <label class="p-0 m-0 sub-title">Search</label>
                    <input type="text" name="search" class="form-control searchbar" name="search">   
                </div>
                <div class="form-group col-sm-4">
                    <label class="p-0 m-0 sub-title">Filter by</label>
                    <select name="" id="" class="form-control" style="background: #fbebd8; color: #A90011; border: none; font-weight: 600; ">
                        <option value="">All</option>
                        <option value="">Grade 1</option>
                        <option value="">Grade 2</option>
                        <option value="">Grade 3</option>
                        <option value="">Grade 4</option>
                        <option value="">Grade 5</option>
                        <option value="">Grade 6</option>
                        <option value="">Grade 7</option>
                        <option value="">Grade 8</option>
                        <option value="">Grade 9</option>
                        <option value="">Grade 10</option>
                    </select>
                </div>
                <div class="form-group col-sm-auto">
                    <br>
                    <button type="submit" class="search-button" style="padding-top: 8.7px; padding-bottom: 8.7px;">Search</button>      
                </div>
            </div>
            
            
            <div class="row mx-3 py-2">       
                @foreach($classSchedules as $classSchedules)        
                <a href='{{ route('classSchedule.show',$classSchedules->id)  }}' class="userSelection">
                <div class="col-md-auto zoom">
                        <p class="text-center p-0 m-0" style="font-size: 60px; font-weight: 800; color: #d11d27">{{$classSchedules->gradeLevelIcon}}</p>
                        <p class="mt-1 DivHeaderText text-center user-name">{{$classSchedules->gradeLevel}}</p>
                        <small class="d-flex justify-content-center user-role">{{$classSchedules->section}}</small>    
                </div>
                </a>
                @endforeach
            </div>
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

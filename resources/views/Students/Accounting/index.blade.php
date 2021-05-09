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
            <p class="header-title"><a href="/students" style="color: white"><i class="fas fa-arrow-left"></i></a> Accounting</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3">
            <div class="form-row row mt-3">
                <div class="form-group col-sm-12">
                    {{-- <label class="p-0 m-0 sub-title">Search</label> --}}
                    <input type="text" name="search" class="form-control searchbar" name="search" placeholder="Search">   
                </div>
                
            </div>
            <div class="form-row">
                <div class="form-group col-sm">
                    <label class="p-0 m-0 sub-title">Filter by</label>
                    <select name="" id="" class="form-control" style="background: #fbebd8; color: #A90011; border: none; font-weight: 600;" onchange="showDiv(this)">
                        <option value="0">All</option>
                        <option value="1">Grade Level</option>
                    </select>
                </div>
                <div class="form-group col-sm" id="grade_div">
                    <br>
                    <select name="" id="" class="form-control" style="background: #fbebd8; color: #A90011; border: none; font-weight: 600; ">
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
                <div class="form-group col-sm" id="section_div">
                    <br>
                    <select name="" id="" class="form-control" style="background: #fbebd8; color: #A90011; border: none; font-weight: 600;">
                        <option value="0">All Section</option>
                        <option value="1">Section XX</option>
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
                    <th width="300px">Student Name</th>
                    <th width="150px">Grade Level</th>
                    <th width="150px">Section</th>
                    <th width="300px" class="text-center">Action</th>
                </thead>
                <tbody class="tbody-data">
                    @foreach ($enrolled as $enrolled)
                        <tr>
                            <td class="align-middle">{{$enrolled->studentInfo->username}}</td>
                            <td class="align-middle">{{$enrolled->studentInfo->firstName}} {{$enrolled->studentInfo->middleName}} {{$enrolled->studentInfo->lastName}}</td>
                            <td class="align-middle">{{$enrolled->enrolled->gradeLevel}}</td>
                            <td class="align-middle">{{$enrolled->enrolled->section}}</td>
                            <td class="text-center">
                                <button style="button" class="search-button" onclick="window.location='{{ route('accounting.show',$enrolled->id) }}'">Records</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="table-responsive">   
                <table class="table table-borderless table-displayer" id= "TblSorter1">
                  <thead>
                    <tr class="text-center">
                        <th width="100px" class="th-border">Student ID</th>
                        <th width="300px" class="th-border">Student Name</th>
                        <th width="200px" class="th-border">Actions</th>
                   </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td class="align-middle td-border">A117A0909</td>
                        <td class="align-middle td-border">James Patrick Diwa</td>
                        <td class="text-center td-border">
                            <button type="button" class="save-button mx-1" onclick="window.location='{{ url('accounting-show') }}'">SELECT</button>
                            <button type="button" class="update-button mx-1">UPDATE</button>
                        </td>
                      </tr>
                      <tr>
                        <td class="align-middle td-border">A117A0908</td>
                        <td class="align-middle td-border">Aleli Santiago</td>
                        <td class="text-center td-border">
                            <button type="button" class="save-button mx-1" onclick="window.location='{{ url('accounting-show') }}'">SELECT</button>
                            <button type="button" class="update-button mx-1">UPDATE</button>
                        </td>
                      </tr>
                  </tbody>
                </table>
            </div> --}}
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
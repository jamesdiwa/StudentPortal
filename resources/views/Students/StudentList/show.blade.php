@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            {{-- <button type="button" class="back-button float-right" onclick="window.location='{{ route('studentList.edit',$student->id) }}'">Edit</button> --}}
            <p class="header-title d-inline">Student Records</p>
            {{-- <button class="float-right create-button" onclick="window.location='{{ route('studentList.edit',$student->id) }}'">Edit</button> --}}
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3 py-3"> 
            <!-- Basic Info -->
            {{-- <p class="DivHeaderText mb-2 pb-2">BASIC INFORMATION</p> --}}
            <div class="row">
                <div class="col-sm-5" style="border-right: 1px solid #ebebeb">
                        <div class="row pb-2">
                            <div class="col-sm-12 d-flex justify-content-center">
                                @if ($student->photoPath != null)
                                    <img class="rounded-circle" src="{{ asset('images/UserPhoto/'.$student->photoPath) }}" style="width: 200px; height: 200px">
                                @else
                                    <img class="rounded-circle" src="{{ asset('images/1.jpg') }}" style="width: 200px; height: 200px; border: 1px solid #0fceca">
                                @endif
                            </div>
                        </div>
                        <p class="data text-center p-0 m-0" style="font-size: 17px">{{$student->firstName}} {{$student->middleName}} {{$student->lastName}} ({{$student->status}})</p></td>
                        <p class="sub-title text-center">{{$student->username}}</p>
                    <table class="table table-borderless">
                        <tbody class="tbody-data">
                            <tr>
                                <td class="font-weight-normal" width="38%">Date of Birth</td>
                                <td  width="62%" style="color: #1e1e1e">{{$student->month}} {{$student->day}},{{$student->year}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-normal">Gender</td>
                                <td style="color: #1e1e1e">{{$student->gender}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-normal">Permanent Address</td>
                                <td style="color: #1e1e1e">{{$student->permanentAddress}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-normal">Present Address</td>
                                <td style="color: #1e1e1e">{{$student->presentAddress}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-normal">Email Address</td>
                                <td style="color: #1e1e1e">{{$student->email}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-normal">Contact Number</td>
                                <td style="color: #1e1e1e">{{$student->contactNumber}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-7">
                    <!-- Guardian Details -->
                    <p class="DivHeaderText my-2 py-2">GUARDIAN INFORMATION</p>
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="label">Full Name</label>
                            <p class="data pl-3">{{$student->studentGuardian->gFirstName}} {{$student->studentGuardian->gMiddleName}} {{$student->studentGuardian->gLastname}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="label">Relationship</label>
                            <p class="data pl-3">{{$student->studentGuardian->gRelationship}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="label">Complete Address</label>
                            <p class="data pl-3">{{$student->studentGuardian->gCompleteAddress}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="label">Contact Number</label>
                            <p class="data pl-3">{{$student->studentGuardian->gContactNumber}}</p>
                        </div>
                    </div>
                    <!-- Requirements -->
                    <p class="DivHeaderText my-2 py-2">SCHOOL REQUIREMENTS</p>
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="label">Submitted Documents</label>
                            <p class="data pl-3 p-0 m-0">{{$student->studentRequirements->PBC ?? ''}}</p>
                            <p class="data pl-3 p-0 m-0">{{$student->studentRequirements->SMR ?? ''}}</p>
                            <p class="data pl-3 p-0 m-0">{{$student->studentRequirements->SRC ?? ''}}</p>
                            <p class="data pl-3 p-0 m-0">{{$student->studentRequirements->GMC ?? ''}}</p>
                        </div>
                    </div>
                </div>
            </div>
           
             <!-- Completion Status -->
             <p class="DivHeaderText my-2 py-2">GRADE LEVEL STATUS</p>
             <table class="table table-borderless">
                <thead class="thead-bg text-center">
                    <th width="100px">Grade Level</th>
                    <th width="300px">School</th>
                    <th width="100px">School Year</th>
                    <th width="100px">Status</th>
                    <th width="100px">Action</th>
                </thead>
                <tbody class="tbody-data">


                    @foreach ($enrolled as $enrolled)
                        <tr class="text-center">
                            <td class="text-left align-middle">{{$enrolled->enrolled->gradeLevel}}</td>
                            <td class="align-middle">Sacred Heart of Jesus Catholic School</td>
                            <td class="align-middle">SY {{$enrolled->enrolled->schoolYearFrom}}-{{$enrolled->enrolled->schoolYearTo}}</td>
                            <td><span style="color: #8cbd01">{{$enrolled->status}}</span></td>
                            <td class="text-center">
                                <form class="form-horizontal" method="POST" action="{{route('enrollShow')}}">
                                    @csrf
                                    <input type="hidden" value="{{$enrolled->studentInfo->id}}" name="studentId">
                                    <input type="hidden" value="{{$enrolled->enrolled->gradeLevel}}" name="gradeLevel">
                                    <input type="hidden" value="studentShow" name="studentShow">
                                    <button type="submit" class="search-button" >Records</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                   
                </tbody>
             </table>
           
            <div class="row mt-4 mb-2">
                <div class="col-sm-12">
                    <!-- if not enroll -->
                    <button type="button" class="edit-button" onclick="window.location='{{ route('studentList.edit',$student->id) }}'">Edit</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('studentList.index') }}'">Back</button>
                </div>
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
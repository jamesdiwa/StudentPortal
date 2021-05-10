@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">Grading Administration</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3 py-3"> 
            <div class="p-3">
                <p class="sub-title p-0 m-0" style="font-size: 20px">{{$enrolled->studentInfo->firstName}} {{$enrolled->studentInfo->middleName}} {{$enrolled->studentInfo->lastName}}</p>
                <p class="sub-title p-0 m-0 font-weight-normal">{{$enrolled->studentInfo->username}} ({{$enrolled->enrolled->gradeLevel}} - {{$enrolled->enrolled->section}})</p>
            </div>
    <form class="form-horizontal" method="POST" action="{{route('studentGradeStore')}}">
        @csrf
        <input type="hidden" name="enrolledId" value="{{$enrolled->id}}">
        <input type="hidden" name="userId" value="{{$enrolled->studentInfo->id}}">
            <table class="table table-borderless">
                <thead class="thead-bg text-center">
                    <th width="150px">Subject</th>
                    <th width="100px">First Quarter</th>
                    <th width="100px">Second Quarter</th>
                    <th width="100px">Third Quarter</th>
                    <th width="100px">Fourth Quarter</th>
                    <th width="100px">Average</th>
                    <th width="100px">Remarks</th>
                </thead>
                <tbody class="tbody-data">
                    @php
                        $count = 0;   
                    @endphp
                    @foreach ($studentGrades as $studentGrades)
                    @php
                        $count++;
                    @endphp
                        <tr class="text-center">
                            <input type="hidden" name="grades[{{$count}}][userId]" value="{{$enrolled->studentInfo->id}}">
                            <input type="hidden" name="grades[{{$count}}][enrolledId]" value="{{$enrolled->id}}">
                            <input type="hidden" name="grades[{{$count}}][classSchedId]" value="{{$enrolled->classSchedId}}">
                            <input type="hidden" name="grades[{{$count}}][gradeLevel]" value="{{$enrolled->enrolled->gradeLevel}}">
                            <input type="hidden" name="grades[{{$count}}][subject]" value="{{$studentGrades->subject}}">
                            <td class="text-left align-middle">{{$studentGrades->subject}}</td>
                            <td><input type="number" class="form-control" name="grades[{{$count}}][firstQuarter]" value="{{$studentGrades->firstQuarter ?? '0'}}"></td>
                            <td><input type="number" class="form-control" name="grades[{{$count}}][secondQuarter]" value="{{$studentGrades->secondQuarter ?? '0'}}"></td>
                            <td><input type="number" class="form-control" name="grades[{{$count}}][thirdQuarter]" value="{{$studentGrades->thirdQuarter ?? '0'}}"></td>
                            <td><input type="number" class="form-control" name="grades[{{$count}}][fourthQuarter]" value="{{$studentGrades->fourthQuarter ?? '0'}}"></td>
                            <td class="align-middle">0</td>
                            <td class="align-middle"></td>
                            {{-- <td class="align-middle"><span style="color: #8cbd01">Passed</span></td> --}}
                        </tr>
                    @endforeach
                </tbody>
             </table>
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="submit" class="save-button">Save</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('grading.index') }}'">Back</button>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>

@endsection
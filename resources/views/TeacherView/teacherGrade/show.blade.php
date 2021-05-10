@extends('layouts.master')

@section('content')

@include('layouts.vtabTeacher')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">Grading Administration</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3 py-3"> 
            <div class="row py-3">
                <div class="col-sm-auto d-flex justify-content-center align-self-center">
                    <img class="rounded-circle" src="{{ asset('images/1.jpg') }}"  style="width: 60px; height: 60px; border: 1px solid #0fceca">
                </div>
                <div class="col-sm d-block align-self-center px-0">
                    <p class="sub-title p-0 m-0" style="font-size: 20px">James Patrick Diwa (A117A0909)</p>
                    <p class="sub-title p-0 m-0 font-weight-normal">Grade 1 - Mabait</p>
                </div>
            </div>
            <table class="table table-borderless">
                <thead class="thead-bg text-center">
                    <th width="100px">Subject</th>
                    <th width="100px">First Quarter</th>
                    <th width="100px">Second Quarter</th>
                    <th width="100px">Third Quarter</th>
                    <th width="100px">Fourth Quarter</th>
                    <th width="100px">Average</th>
                    <th width="100px">Remarks</th>
                </thead>
                <tbody class="tbody-data">
                    <tr class="text-center">
                        <td class="text-left align-middle">Math 1</td>
                        <td class="firstQuarter align-middle">80</td>
                        <td class="secondQuarter align-middle">80</td>
                        <td class="thirdQuarter align-middle">80</td>
                        <td class="fourthQuarter align-middle">80</td>
                        <td class="average align-middle">80</td>
                        <td><span style="color: #8cbd01">Passed</span></td>
                    </tr>
                </tbody>
             </table>
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="button" class="edit-button" onclick="window.location='{{ url('gradingEdit') }}'">Update</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ url('gradingIndex') }}'">Back</button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
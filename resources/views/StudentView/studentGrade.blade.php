@extends('layouts.master')

@section('content')

@include('layouts.vtabStudent')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title d-inline">My Grade</p>
            <button class="float-right create-button">Print</button>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3 py-3"> 
            <div class="row my-3">
                <div class="col-sm-6">
                    <table>
                        <tbody class="tbody-data">
                            <tr>
                                <td width="110px" class="font-weight-normal">School Year</td>
                                <td style="color: #1e1e1e">2020-2021</td>
                            </tr>
                            <tr>
                                <td class="font-weight-normal">Grade Level</td>
                                <td style="color: #1e1e1e">Grade 1</td>
                            </tr>
                            <tr>
                                <td class="font-weight-normal">Section</td>
                                <td style="color: #1e1e1e">Mabait</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6">
                    <table>
                        <tbody class="tbody-data">
                            <tr>
                                <td width="110px" class="font-weight-normal">Adviser</td>
                                <td style="color: #1e1e1e">Ms. Aleli Santiago</td>
                            </tr>
                            <tr>
                                <td class="font-weight-normal">GWA</td>
                                <td style="color: #1e1e1e">85</td>
                            </tr>
                        </tbody>
                    </table>
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
                        <td class="text-left">Math 1</td>
                        <td>80</td>
                        <td>80</td>
                        <td>80</td>
                        <td>80</td>
                        <td>80</td>
                        <td><span style="color: #8cbd01">Passed</span></td>
                    </tr>
                </tbody>
             </table>
        </div>

    </div>
</div>
@endsection
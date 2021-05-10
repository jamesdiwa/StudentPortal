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
            <div class="row my-3">
                <div class="col-sm-6">
                    <table>
                        <tbody class="tbody-data">
                            <tr>
                                <td width="110px" class="font-weight-normal">Grade Level</td>
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
                                <td width="110px" class="font-weight-normal">School Year</td>
                                <td style="color: #1e1e1e">2020-2021</td>
                            </tr>
                            <tr>
                                <td class="font-weight-normal">Subject</td>
                                <td style="color: #1e1e1e">Math 1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <table class="table table-borderless">
                <thead class="thead-bg text-center">
                    <th width="300px">Student Name</th>
                    <th width="100px">1st Quarter</th>
                    <th width="100px">2nd Quarter</th>
                    <th width="100px">3rd Quarter</th>
                    <th width="100px">4th Quarter</th>
                    <th width="100px">Average</th>
                    <th width="100px">Remarks</th>
                </thead>
                <tbody class="tbody-data">
                    <tr class="text-center">
                        <td class="text-left align-middle">Student Name</td>
                        <td><input type="number" class="form-control"></td>
                        <td><input type="number" class="form-control"></td>
                        <td><input type="number" class="form-control"></td>
                        <td><input type="number" class="form-control"></td>
                        <td class="align-middle average"></td>
                        <td class="align-middle"><span style="color: #8cbd01">Passed</span></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left align-middle">Student Name</td>
                        <td><input type="number" class="form-control"></td>
                        <td><input type="number" class="form-control"></td>
                        <td><input type="number" class="form-control"></td>
                        <td><input type="number" class="form-control"></td>
                        <td class="align-middle average"></td>
                        <td class="align-middle"><span style="color: #8cbd01">Passed</span></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left align-middle">Student Name</td>
                        <td><input type="number" class="form-control"></td>
                        <td><input type="number" class="form-control"></td>
                        <td><input type="number" class="form-control"></td>
                        <td><input type="number" class="form-control"></td>
                        <td class="align-middle average"></td>
                        <td class="align-middle"><span style="color: #8cbd01">Passed</span></td>
                    </tr>
                </tbody>
             </table>
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="submit" class="save-button">Save</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ url('gradingIndex') }}'">Back</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
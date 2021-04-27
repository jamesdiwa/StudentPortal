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
                <p class="sub-title p-0 m-0" style="font-size: 20px">James Patrick Diwa</p>
                <p class="sub-title p-0 m-0 font-weight-normal">A117A0909 (Grade 7 - Sampaguita)</p>
            </div>
            <table class="table table-borderless">
                <thead class="thead-bg text-center">
                    <th width="150px">Subject</th>
                    <th width="100px">First Grading</th>
                    <th width="100px">Second Grading</th>
                    <th width="100px">Third Grading</th>
                    <th width="100px">Fourth Grading</th>
                    <th width="100px">Average</th>
                    <th width="100px">Remarks</th>
                </thead>
                <tbody class="tbody-data">
                    <tr class="text-center">
                        <td class="text-left align-middle">English 1</td>
                        <td><input type="number" class="form-control"></td>
                        <td><input type="number" class="form-control"></td>
                        <td><input type="number" class="form-control"></td>
                        <td><input type="number" class="form-control"></td>
                        <td class="align-middle">89</td>
                        <td class="align-middle"><span style="color: #8cbd01">Passed</span></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left align-middle">Math 1</td>
                        <td><input type="number" class="form-control"></td>
                        <td><input type="number" class="form-control"></td>
                        <td><input type="number" class="form-control"></td>
                        <td><input type="number" class="form-control"></td>
                        <td class="align-middle">74</td>
                        <td class="align-middle"><span style="color: red">Failed</span></td>
                    </tr>
                </tbody>
             </table>
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="submit" class="save-button">Save</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('grading.index') }}'">Back</button>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
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
                    <th>Subject</th>
                    <th>First Grading</th>
                    <th>Second Grading</th>
                    <th>Third Grading</th>
                    <th>Fourth Grading</th>
                    <th>Average</th>
                    <th>Remarks</th>
                </thead>
                <tbody class="tbody-data">
                    <tr class="text-center">
                        <td class="text-left">English 1</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td><span style="color: #8cbd01">Passed</span></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left">Math 1</td>
                        <td>70</td>
                        <td>70</td>
                        <td>70</td>
                        <td>70</td>
                        <td>70</td>
                        <td><span style="color: red">Failed</span></td>
                    </tr>
                </tbody>
             </table>
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="submit" class="edit-button" onclick="window.location='{{ url('grading-edit') }}'">Update</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('grading.index') }}'">Back</button>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
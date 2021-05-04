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
            <div class="row py-3">
                <div class="col-sm-auto d-flex justify-content-center align-self-center">
                    <img class="rounded-circle" src="{{ asset('images/1.jpg') }}" style="width: 60px; height: 60px; border: 1px solid #0fceca">
                </div>
                <div class="col-sm d-block align-self-center px-0">
                    <p class="sub-title p-0 m-0" style="font-size: 20px">James Patrick Diwa</p>
                    <p class="sub-title p-0 m-0 font-weight-normal">A117A0909 (Grade 7 - Sampaguita)</p>
                </div>
            </div>
            {{-- <div class="p-3">
                
            </div> --}}
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
                        <td class="text-left">Mother Tongue</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td><span style="color: #8cbd01">Passed</span></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left">Filipino 1</td>
                        <td>70</td>
                        <td>70</td>
                        <td>70</td>
                        <td>70</td>
                        <td>70</td>
                        <td><span style="color: red">Failed</span></td>
                    </tr>
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
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td><span style="color: #8cbd01">Passed</span></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left">Science 1</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td><span style="color: #8cbd01">Passed</span></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left">AP 1</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td><span style="color: #8cbd01">Passed</span></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left">ESP 1</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td><span style="color: #8cbd01">Passed</span></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left">Mapeh 1</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td><span style="color: #8cbd01">Passed</span></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left pl-4">Music</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left pl-4">Arts</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left pl-4">Physical Education</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left pl-4">Health</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td>89</td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
             </table>
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="button" class="edit-button" onclick="window.location='{{ url('grading-edit') }}'">Update</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('grading.index') }}'">Back</button>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
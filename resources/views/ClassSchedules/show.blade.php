@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">Class Schedule</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3 pt-3">
            <div class="row">
                <div class="col-sm-8">
                    <p class="p-0 m-0" style="color: #676767; font-weight: 800; letter-spacing: 1px; font-size: 25px">GRADE 1 (SAMPAGUITA) CLASS SCHEDULE</p>
                    <p class="p-0 m-0" style="color: #d11d27; font-size: 15px; letter-spacing: 1px; font-weight: 600">Schedule for AY 2020 - 2021</p>
                    <p class="p-0 m-0" style="color: #1e1e1e; font-size: 14px; letter-spacing: 1px; font-weight: 500">Ms. Aleli Santiago (Class Adviser)</p>
                </div>
                <div class="col-sm-4">
                    <div class="p-2" style="background: #fbebd8; min-height: 80px; border-radius: 5px">
                        <p class="p-0 m-0" style="color: #d11d27; font-size: 14px">Notes:</p>
                        <p class="pl-2 p-0 m-0 text-justify" style="color: #d11d27; font-size: 13px">Lorem Ipsum Dolor</p>
                    </div>

                </div>
            </div>
            <div class="row p-3 mt-2">
                <div class="col-sm">
                    <div class="row p-3" style="background: #ebebeb">
                        <div class="col-sm-12">
                            <p class="text-center sub-title p-0 m-0">Monday</p>
                        </div>
                    </div>
                    <!-- loop here -->
                    <div class="row p-2">
                        <div class="col-sm-12">
                            <p class="text-center sub-title" style="color: #1e1e1e">Math 1
                            <small class="d-flex justify-content-center user-role">Ms. Aleli Santiago</small> 
                            <small class="d-flex justify-content-center user-role" style="color: #8cbd01">(07:00 am to 8:00 am)</small> 
                        </div>
                    </div>
                    <!-- loop ends here -->
                </div>
                <div class="col-sm">
                    <div class="row p-3" style="background: #ebebeb">
                        <div class="col-sm-12">
                            <p class="text-center sub-title p-0 m-0">Tuesday</p>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-12">
                            <p class="text-center sub-title" style="color: #1e1e1e">Math 1
                            <small class="d-flex justify-content-center user-role">Ms. Aleli Santiago</small> 
                            <small class="d-flex justify-content-center user-role" style="color: #8cbd01">(07:00 am to 8:00 am)</small> 
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="row p-3" style="background: #ebebeb">
                        <div class="col-sm-12">
                            <p class="text-center sub-title p-0 m-0">Wednesday</p>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-12">
                            <p class="text-center sub-title" style="color: #1e1e1e">Math 1
                            <small class="d-flex justify-content-center user-role">Ms. Aleli Santiago</small> 
                            <small class="d-flex justify-content-center user-role" style="color: #8cbd01">(07:00 am to 8:00 am)</small> 
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="row p-3" style="background: #ebebeb">
                        <div class="col-sm-12">
                            <p class="text-center sub-title p-0 m-0">Thursday</p>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-12">
                            <p class="text-center sub-title" style="color: #1e1e1e">Math 1
                            <small class="d-flex justify-content-center user-role">Ms. Aleli Santiago</small> 
                            <small class="d-flex justify-content-center user-role" style="color: #8cbd01">(07:00 am to 8:00 am)</small> 
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="row p-3" style="background: #ebebeb">
                        <div class="col-sm-12">
                            <p class="text-center sub-title p-0 m-0">Friday</p>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-12">
                            <p class="text-center sub-title" style="color: #1e1e1e">Math 1
                            <small class="d-flex justify-content-center user-role">Ms. Aleli Santiago</small> 
                            <small class="d-flex justify-content-center user-role" style="color: #8cbd01">(07:00 am to 8:00 am)</small> 
                        </div>
                    </div>
                </div>
            </div>
            {{-- <table class="table table-bordered mt-3">
                <thead class="text-center">
                    <th width="200px">Monday</th>
                    <th width="200px">Tuesday</th>
                    <th width="200px">Wednesday</th>
                    <th width="200px">Thursday</th>
                    <th width="200px">Friday</th>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>
                            Math 1
                            <small class="d-flex justify-content-center user-role">Ms. Aleli Santiago</small> 
                            <small class="d-flex justify-content-center user-role" style="color: #8cbd01">(07:00 am to 8:00 am)</small> 
                        </td>
                        <td>
                            English 1
                            <small class="d-flex justify-content-center user-role">Ms. Aleli Santiago</small>
                            <small class="d-flex justify-content-center user-role" style="color: #8cbd01">(07:00 am to 8:00 am)</small> 
                        </td>
                        <td>
                            Filipino 1
                            <small class="d-flex justify-content-center user-role">Ms. Aleli Santiago</small>
                            <small class="d-flex justify-content-center user-role" style="color: #8cbd01">(07:00 am to 8:00 am)</small> 
                        </td>
                        <td>
                            Music 1
                            <small class="d-flex justify-content-center user-role">Ms. Aleli Santiago</small> 
                            <small class="d-flex justify-content-center user-role" style="color: #8cbd01">(07:00 am to 8:00 am)</small> 
                        </td>
                        <td>
                            Arts 1
                            <small class="d-flex justify-content-center user-role">Ms. Aleli Santiago</small> 
                            <small class="d-flex justify-content-center user-role" style="color: #8cbd01">(07:00 am to 8:00 am)</small> 
                        </td>
                    </tr>
                </tbody>
            </table> --}}
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="submit" class="edit-button">Edit</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('classSchedule.index') }}'">Back</button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

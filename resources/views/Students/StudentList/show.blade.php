@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">Student Records</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3 py-3"> 
            <!-- Basic Info -->
            <p class="DivHeaderText mb-2 pb-2">BASIC INFORMATION</p>
            <div class="row">
                <div class="col-sm-12">
                    <label class="label">Student Number</label>
                    <p class="data pl-3">A117A0909</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label class="label">First Name</label>
                    <p class="data pl-3">James Patrick</p>
                </div>
                <div class="col-sm-4">
                    <label class="label">Middle Name</label>
                    <p class="data pl-3">Marabe</p>
                </div>
                <div class="col-sm-4">
                    <label class="label">Last Name</label>
                    <p class="data pl-3">Diwa</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <label class="label">Date of Birth</label>
                    <p class="data pl-3">July 18, 1996</p>
                </div>
                <div class="col-sm-4">
                    <label class="label">Gender</label>
                    <p class="data pl-3">Male</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="label">Permanent Address</label>
                    <p class="data pl-3">Lorem Ipsum Dolor</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="label">Present Address</label>
                    <p class="data pl-3">Lorem Ipsum Dolor</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label class="label">Email Address</label>
                    <p class="data pl-3">jamesdiwa05@gmail.com</p>
                </div>
                <div class="col-sm-6">
                    <label class="label">Contact Number</label>
                    <p class="data pl-3">09164389070</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label class="label">School Year</label>
                    <p class="data pl-3">2020-2021</p>
                </div>
                <div class="col-sm-6">
                    <label class="label">LRN</label>
                    <p class="data pl-3">8545154854</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="label">School Last Attended</label>
                    <p class="data pl-3">Lorem Ipsum Dolor</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label class="label">Grade Level Completed</label>
                    <p class="data pl-3">Grade 8</p>
                </div>
                <div class="col-sm-6">
                    <label class="label">General Grade Average</label>
                    <p class="data pl-3">89</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label class="label">Status</label>
                    <p class="data pl-3">Active</p>
                </div>
            </div>
            <hr>
            <!-- Guardian Details -->
            <p class="DivHeaderText my-2 py-2">GUARDIAN INFORMATION</p>
            <div class="row">
                <div class="col-sm-4">
                    <label class="label">First Name</label>
                    <p class="data pl-3">Aleli</p>
                </div>
                <div class="col-sm-4">
                    <label class="label">Middle Name</label>
                    <p class="data pl-3">Evans</p>
                </div>
                <div class="col-sm-4">
                    <label class="label">Last Name</label>
                    <p class="data pl-3">Santiago</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="label">Relationship</label>
                    <p class="data pl-3">Mother</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="label">Complete Address</label>
                    <p class="data pl-3">Lorem Ipsum Dolor</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label class="label">Contact Number</label>
                    <p class="data pl-3">09164389070</p>
                </div>
            </div>
            <hr>
             <!-- Requirements -->
             <p class="DivHeaderText my-2 py-2">SCHOOL REQUIREMENTS</p>
             <div class="row">
                 <div class="col-sm-12">
                    <label class="label">Submitted Documents</label>
                    <p class="data pl-3">Lorem Ipsum Dolor, Lorem Ipsum Dolor</p>
                 </div>
             </div>
             <hr>
             <!-- Completion Status -->
             <p class="DivHeaderText my-2 py-2">GRADE LEVEL STATUS</p>
             <table class="table table-borderless">
                <thead class="thead-bg text-center">
                    <th width="100px">Grade Level</th>
                    <th width="300px">School</th>
                    <th width="100px">School Year</th>
                    <th width="100px">Status</th>
                </thead>
                <tbody class="tbody-data">
                    <tr class="text-center">
                        <td class="text-left">Grade 1</td>
                        <td>Sacred Heart of Jesus Catholic School</td>
                        <td>AY 2019-2020</td>
                        <td><span style="color: #8cbd01">Completed</span></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left">Grade 2</td>
                        <td>Sacred Heart of Jesus Catholic School</td>
                        <td>AY 2020-2021</td>
                        <td><span style="color: #097b9e">Ongoing</span></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left">Grade 3</td>
                        <td></td>
                        <td></td>
                        <td colspan="3"><span style="color: #1e1e1e">No records yet</span></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left">Grade 4</td>
                        <td></td>
                        <td></td>
                        <td colspan="3"><span style="color: #1e1e1e">No records yet</span></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left">Grade 5</td>
                        <td></td>
                        <td></td>
                        <td colspan="3"><span style="color: #1e1e1e">No records yet</span></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left">Grade 6</td>
                        <td></td>
                        <td></td>
                        <td colspan="3"><span style="color: #1e1e1e">No records yet</span></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left">Grade 7</td>
                        <td></td>
                        <td></td>
                        <td colspan="3"><span style="color: #1e1e1e">No records yet</span></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left">Grade 8</td>
                        <td></td>
                        <td></td>
                        <td colspan="3"><span style="color: #1e1e1e">No records yet</span></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left">Grade 9</td>
                        <td></td>
                        <td></td>
                        <td colspan="3"><span style="color: #1e1e1e">No records yet</span></td>
                    </tr>
                    <tr class="text-center">
                        <td class="text-left">Grade 10</td>
                        <td></td>
                        <td></td>
                        <td colspan="3"><span style="color: #1e1e1e">No records yet</span></td>
                    </tr>
                </tbody>
             </table>
             <hr>
             <!-- Student Grade -->
             <p class="DivHeaderText my-2 py-2">STUDENT GRADE</p>
             <div class="row">
                <div class="form-group col-sm-4">
                    <label class="p-0 m-0 sub-title">View Grades by</label>
                    <select name="" id="" class="form-control" style="background: #fbebd8; color: #A90011; border: none; font-weight: 600; font-size: 14px">
                        <option value="">AY 2020-2021</option>
                    </select>
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
             <hr>
             <!-- Accounting -->
             <p class="DivHeaderText my-2 py-2">ACCOUNTING RECORD</p>
             <div class="row">
                <div class="form-group col-sm-4">
                    <label class="p-0 m-0 sub-title">View Records by</label>
                    <select name="" id="" class="form-control" style="background: #fbebd8; color: #A90011; border: none; font-weight: 600; font-size: 14px">
                        <option value="">AY 2020-2021</option>
                    </select>
                </div>
             </div>
             <table class="table table-borderless">
                <thead class="thead-bg text-center">
                    <th>School Year</th>
                    <th>Month</th>
                    <th>Payment</th>
                    <th>Date of Payment</th>
                    <th>Remarks</th>
                </thead>
                <tbody class="tbody-data">
                    <tr class="text-center">
                        <td>AY 2020-2021</td>
                        <td>June</td>
                        <td>1500</td>
                        <td>June 01, 2020</td>
                        <td>Downpayment</td>
                    </tr>
                    <tr class="text-center">
                        <td></td>
                        <td>July</td>
                        <td>1000</td>
                        <td>July 15, 2020</td>
                        <td>Installment</td>
                    </tr>
                </tbody>
             </table>
             <table class="table table-borderless">
                <thead class="thead-bg text-center">
                    <th width="700px" class="text-right">Total Payment</th>
                    <th>2500</th>
                </thead>
                <thead class="thead-bg text-center">
                    <th class="text-right">Balance</th>
                    <th>11000</th>
                </thead>
                <thead class="thead-bg text-center">
                    <th class="text-right">Refund</th>
                    <th>0</th>
                </thead>
             </table>
            <div class="row mt-4 mb-2">
                <div class="col-sm-12">
                    <!-- if not enroll -->
                    <button type="button" class="edit-button" onclick="window.location='{{ route('enrollment.create') }}'">Enroll</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('studentList.index') }}'">Back</button>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
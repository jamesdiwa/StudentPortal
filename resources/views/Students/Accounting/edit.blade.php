@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title d-inline">Accounting</p>
        </div>
    </div>
<form class="form-horizontal" method="POST" action="{{route('accounting.store')}}">
    @csrf

    <input type="hidden" value="{{$enrolled->userId}}" name="studentId">
    <input type="hidden" value="{{$enrolled->classSchedId}}" name="classSchedId">
    <input type="hidden" value="{{$enrolled->id}}" name="enrolledId">
    <input type="hidden" value="{{$balanceAmount}}" name="balanceAmount">

    <div class="container">
        <div class="DivTemplate mt-3 py-3">
            <div class="form-row">
                <div class="form-group col-sm-4">
                    <label class="input-label">First Name</label>
                    <input type="text" class="form-control" value="{{$enrolled->studentInfo->firstName}} " disabled>
                </div>
                <div class="form-group col-sm-4">
                    <label class="input-label">Middle Name</label>
                    <input type="text" class="form-control" value="{{$enrolled->studentInfo->middleName}}" disabled>
                </div>
                <div class="form-group col-sm-4">
                    <label class="input-label">Last Name</label>
                    <input type="text" class="form-control" value="{{$enrolled->studentInfo->lastName}}" disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label class="input-label">Grade Level</label>
                    <input type="text" class="form-control" value="{{$enrolled->enrolled->gradeLevel}}" disabled>
                </div>
                <div class="form-group col-sm-6">
                    <label class="input-label">Section</label>
                    <input type="text" class="form-control" value="{{$enrolled->enrolled->section}}" disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label class="input-label">School Year</label>
                    <input type="text" class="form-control" value="SY {{$enrolled->enrolled->schoolYearFrom}}-{{$enrolled->enrolled->schoolYearTo}}" disabled>
                </div>
                <div class="form-group col-sm-6">
                    <label class="input-label">ID Number</label>
                    <input type="text" class="form-control" value="{{$enrolled->studentInfo->username}}" disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Payment for the month of</label>
                        <select name="paymentForTheMonth" id="" class="form-control">
                            <option value="" disabled selected>Month</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label class="input-label">Amount</label>
                    <input type="number" name="paymentAmount" class="form-control">
                </div>
                <div class="form-group col-sm-6">
                    <label class="input-label">Date of Payment</label>
                    <input type="date" name="paymentDate" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Notes</label>
                    <textarea name="notes" id="" rows="3" class="form-control"></textarea>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="submit" class="save-button">Save</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('accounting.show',$enrolled->id) }}'">Back</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title d-inline">Accounting</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3 py-3">
            <div class="form-row">
                <div class="form-group col-sm-4">
                    <label class="input-label">First Name</label>
                    <input type="text" class="form-control" value="James Patrick" disabled>
                </div>
                <div class="form-group col-sm-4">
                    <label class="input-label">Middle Name</label>
                    <input type="text" class="form-control" value="Marabe" disabled>
                </div>
                <div class="form-group col-sm-4">
                    <label class="input-label">Last Name</label>
                    <input type="text" class="form-control" value="Diwa" disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label class="input-label">Grade Level</label>
                    <input type="text" class="form-control" value="Grade 7" disabled>
                </div>
                <div class="form-group col-sm-6">
                    <label class="input-label">Section</label>
                    <input type="text" class="form-control" value="Sampaguita   " disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label class="input-label">School Year</label>
                    <input type="text" class="form-control" value="AY 2020-2021" disabled>
                </div>
                <div class="form-group col-sm-6">
                    <label class="input-label">ID Number</label>
                    <input type="text" class="form-control" value="A117A0909" disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Payment for the month of</label>
                        <select name="" id="" class="form-control">
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
                    <input type="number" class="form-control">
                </div>
                <div class="form-group col-sm-6">
                    <label class="input-label">Date of Payment</label>
                    <input type="date" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Notes</label>
                    <textarea name="" id="" rows="3" class="form-control"></textarea>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="submit" class="save-button">Save</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ url('accounting-show') }}'">Back</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
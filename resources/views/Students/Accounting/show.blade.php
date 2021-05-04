@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">Accounting</p>
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
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="submit" class="edit-button" onclick="window.location='{{ url('accounting-edit') }}'">Update</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('accounting.index') }}'">Back</button>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
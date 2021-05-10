@extends('layouts.master')

@section('content')

@include('layouts.vtabStudent')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">My Account</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3 py-3"> 
            <div class="row my-3">
                <div class="col-sm-6">
                    <table>
                        <tbody class="tbody-data">
                                <td width="110px" class="font-weight-normal">Grade Level</td>
                                <td style="color: #1e1e1e">Grade 1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6">
                    <table>
                        <tbody class="tbody-data">
                            <tr>
                                <td width="110px" class="font-weight-normal">Section</td>
                                <td style="color: #1e1e1e">Mabait</td>
                            </tr>
                        </tbody>
                    </table>
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
                            <td>SY 2020-2021</td>
                            <td>June</td>
                            <td class="paymentAmount">10000</td>
                            <td>Jan. 10, 2020</td>
                            <td>test</td>
                        </tr>
                </tbody>
             </table>
             <table class="table table-borderless">
                <thead class="thead-bg text-center">
                    <th width="700px" class="text-right">Montly Payment</th>
                    <th>0</th>
                </thead>
                <thead class="thead-bg text-center">
                    <th width="700px" class="text-right">Tuition Fee</th>
                    <th id="tuitionFeeAmount">0</th>
                </thead>
                <thead class="thead-bg text-center">
                    <th width="700px" class="text-right">Total Payment</th>
                    <th id="totalPayment">0</th>
                </thead>
                <thead class="thead-bg text-center">
                    <th class="text-right">Balance</th>
                    <th id="balance">0</th>
                </thead>
                <thead class="thead-bg text-center">
                    <th class="text-right">Refund</th>
                    <th>0</th>
                </thead>
             </table>
        </div>

    </div>
</div>
@endsection
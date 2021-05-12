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
                                <td style="color: #1e1e1e">{{$enrolled->enrolled->gradeLevel}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6">
                    <table>
                        <tbody class="tbody-data">
                            <tr>
                                <td width="110px" class="font-weight-normal">Section</td>
                                <td style="color: #1e1e1e">{{$enrolled->enrolled->section}}</td>
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
                    @foreach ($payments as $payments)
                        <tr class="text-center">
                            <td>@if($payments->sy != null)SY {{$payments->sy}} @else @endif</td>
                            <td>{{$payments->paymentForTheMonth}}</td>
                            <td class="paymentAmount">{{$payments->paymentAmount}}</td>
                            <td>{{$payments->dateOfPayment}}</td>
                            <td>{{$payments->remarks}}</td>
                        </tr>
                    @endforeach
                </tbody>
             </table>
             <table class="table table-borderless">
                <thead class="thead-bg text-center">
                    <th width="700px" class="text-right">Montly Payment</th>
                    <th>{{$enrolled->monthlyPayment}}</th>
                </thead>
                <thead class="thead-bg text-center">
                    <th width="700px" class="text-right">Tuition Fee</th>
                    <th id="tuitionFeeAmount">{{$enrolled->tuitionFee}}</th>
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
                    <th id="refund">0</th>
                </thead>
             </table>
        </div>

    </div>
</div>


<script>
    $(document).ready(function(){
    $('#totalPayment').html(cashReceived());

    var Balance =  parseFloat($('#tuitionFeeAmount').text().replace(/[^\d.-]/g, '')) - cashReceived();

    if(Balance>0){
        $('#balance').html(Balance);
    }
    else{
        $('#refund').html(Balance* -1);
    }
    $('#balanceAmount').val(Balance);
});

function cashReceived(){
    var totalCash = 0;
    $('.paymentAmount').each(function(){
        var cashReceived = parseFloat($(this).text().replace(/[^\d.-]/g, ''));
        totalCash += cashReceived;
    });
    return totalCash;
}




var msg = "{{Session::get('success')}}";
    var exist = "{{Session::has('success')}}";
    if(exist){
        Swal.fire({
            icon: 'success',
            title: msg,
            showConfirmButton: false,
            timer: 2000,
        });
    }
</script>
@endsection
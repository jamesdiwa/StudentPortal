@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title d-inline">Accounting</p>
            <button class="float-right create-button" onclick="window.open('{{ url('account', $enrolled->id) }}')">Print</button>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3 py-3"> 
            <div class="row py-3">
                <div class="col-sm-auto d-flex justify-content-center align-self-center">
                    @if ($enrolled->studentInfo->photoPath != null)
                        <img class="rounded-circle" src="{{ asset('images/UserPhoto/'.$enrolled->studentInfo->photoPath) }}"  style="width: 60px; height: 60px; border: 1px solid #0fceca">
                    @else
                        <img class="rounded-circle" src="{{ asset('images/1.jpg') }}"  style="width: 60px; height: 60px; border: 1px solid #0fceca">
                    @endif
                </div>
                <div class="col-sm d-block align-self-center px-0">
                    <p class="sub-title p-0 m-0" style="font-size: 20px">{{$enrolled->studentInfo->firstName}} {{$enrolled->studentInfo->middleName}} {{$enrolled->studentInfo->lastName}}</p>
                    <p class="sub-title p-0 m-0 font-weight-normal">{{$enrolled->studentInfo->username}} ({{$enrolled->enrolled->gradeLevel}} - {{$enrolled->enrolled->section}})</p>
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
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">

                    <form class="form-horizontal" method="POST" action="{{route('paymentCreate')}}">
                        @csrf
                        <input type="hidden" value="{{$enrolled->id}}" name="enrolledId">
                        <input type="hidden" id="balanceAmount" name="balanceAmount">

                            <button type="submit" class="edit-button" >Update</button>
                            <button type="button" class="back-button float-right" onclick="window.location='{{ route('accounting.index') }}'">Back</button>
                    </form>
                </div>
            </div>
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
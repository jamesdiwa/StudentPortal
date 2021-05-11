<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<head>
    <title>Accounting Pdf</title>
</head>
<body>
    <table>
        <tr>
            <td>
                <img src="{{ asset('images/logo.jpg') }}" class="mt-n1 mr-2" style="width: 90px; height: 90px">
            </td>
            <td width="1000px">
                <table>
                    <tr>
                        <td>
                            <p class="p-0 m-0" style="color: #d11d27; font-weight: 600; font-size: 20px">Sacred Heart of Jesus Catholic School</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="sub-title p-0 m-0 font-weight-normal" style="font-size: 12px">4324 Old Sta. Mesa, Santa Mesa, Manila, 1016 Metro Manila</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="sub-title p-0 m-0 font-weight-normal" style="font-size: 12px">shjcstg.mesa@gmail.com</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="sub-title p-0 m-0 font-weight-normal" style="font-size: 12px">8-7132856 / 8-7142783</p>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="1000px" class="text-right">
                <p class="p-0 m-0" style="color: #676767; font-weight: 800; letter-spacing: 1px; font-size: 22px">{{$enrolled->studentInfo->firstName}} {{$enrolled->studentInfo->middleName}} {{$enrolled->studentInfo->lastName}} ({{$enrolled->studentInfo->username}})</p>
                <p class="p-0 m-0" style="color: #d11d27; font-size: 15px; letter-spacing: 1px; font-weight: 600">Schedule for AY {{$enrolled->enrolled->schoolYearFrom}} - {{$enrolled->enrolled->schoolYearTo}}</p>
                <p class="p-0 m-0" style="color: #1e1e1e; font-size: 14px; letter-spacing: 1px; font-weight: 500">{{$enrolled->enrolled->gradeLevel}} - {{$enrolled->enrolled->section}}</p>
                <p class="p-0 m-0" style="color: #1e1e1e; font-size: 14px; letter-spacing: 1px; font-weight: 500">@if($enrolled->enrolled->adviserGender == 'Male') Mr. @else Ms. @endif{{$enrolled->enrolled->classAdviser}} (Class Adviser)</p>
            </td>
        </tr>
    </table>
    <div class="mb-5 mt-3" style="border-bottom: 3px solid red"></div>
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
            <th>0</th>
        </thead>
     </table>
</body>
</html>
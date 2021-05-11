@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title d-inline">Student Records</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3 py-3"> 
            <div class="row">
                <div class="col-sm-5" style="border-right: 1px solid #ebebeb">
                        <div class="row pb-2">
                            <div class="col-sm-12 d-flex justify-content-center">
                                    {{-- <img class="rounded-circle" src="{{ asset('images/1.jpg') }}" style="width: 200px; height: 200px; border: 1px solid #0fceca"> --}}
                                @if ($enrolled->studentInfo->photoPath != null)
                                    <img class="rounded-circle" src="{{ asset('images/UserPhoto/'.$enrolled->studentInfo->photoPath) }}" style="width: 200px; height: 200px; border: 1px solid #0fceca">
                                @else
                                    <img class="rounded-circle" src="{{ asset('images/1.jpg') }}" style="width: 200px; height: 200px; border: 1px solid #0fceca">
                                @endif
                            </div>
                        </div>
                        <p class="data text-center p-0 m-0" style="font-size: 17px">{{$enrolled->studentInfo->firstName}} {{$enrolled->studentInfo->middleName}} {{$enrolled->studentInfo->lastName}} (Enrolled)</p></td>
                        <p class="sub-title text-center">{{$enrolled->studentInfo->username}}</p>
                    <table class="table table-borderless">
                        <tbody class="tbody-data">
                            <tr>
                                <td class="font-weight-normal" width="38%">Date of Birth</td>
                                <td  width="62%" style="color: #1e1e1e">{{$enrolled->studentInfo->month}} {{$enrolled->studentInfo->day}},{{$enrolled->studentInfo->year}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-normal">Gender</td>
                                <td style="color: #1e1e1e">{{$enrolled->studentInfo->gender}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-normal">Permanent Address</td>
                                <td style="color: #1e1e1e">{{$enrolled->studentInfo->permanentAddress}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-normal">Present Address</td>
                                <td style="color: #1e1e1e">{{$enrolled->studentInfo->presentAddress}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-normal">Email Address</td>
                                <td style="color: #1e1e1e">{{$enrolled->studentInfo->email}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-normal">Contact Number</td>
                                <td style="color: #1e1e1e">{{$enrolled->studentInfo->contactNumber}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-7">
                    <!-- Requirements -->
                    <p class="DivHeaderText my-2 py-2">STUDENT INFORMATION</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="label">Grade Level</label>
                            <p class="data pl-3">{{$enrolled->enrolled->gradeLevel}}</p>
                        </div>
                        <div class="col-sm-6">
                            <label class="label">Section</label>
                            <p class="data pl-3">{{$enrolled->enrolled->section}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="label">School Year</label>
                            <p class="data pl-3">{{$enrolled->enrolled->schoolYearFrom}}-{{$enrolled->enrolled->schoolYearTo}}</p>
                        </div>
                        <div class="col-sm-6">
                            <label class="label">Adviser</label>
                            <p class="data pl-3">@if($enrolled->enrolled->adviserGender == 'Male') Mr. @else Ms. @endif{{$enrolled->enrolled->classAdviser}}</p>
                        </div>
                    </div>
                   
                    <!-- Guardian Details -->
                    <p class="DivHeaderText my-2 py-2">GUARDIAN INFORMATION</p>
                    <div class="row">
                        <div class="col-sm-8">
                            <label class="label">Full Name</label>
                            <p class="data pl-3">{{$enrolled->studentInfo->studentGuardian->gFirstName}} {{$enrolled->studentInfo->studentGuardian->gMiddleName}} {{$enrolled->studentInfo->studentGuardian->gLastname}}</p>
                        </div>
                        <div class="col-sm-4">
                            <label class="label">Relationship</label>
                            <p class="data pl-3">{{$enrolled->studentInfo->studentGuardian->gRelationship}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="label">Complete Address</label>
                            <p class="data pl-3">{{$enrolled->studentInfo->studentGuardian->gCompleteAddress}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="label">Contact Number</label>
                            <p class="data pl-3">{{$enrolled->studentInfo->studentGuardian->gContactNumber}}</p>
                        </div>
                    </div>
                </div>
            </div>


            <p class="DivHeaderText my-2 py-2">GRADES</p>
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
                    @foreach ($studentGrades as $studentGrades)
                        <tr class="text-center">
                            <td class="text-left align-middle">{{$studentGrades->subject}}</td>
                            <td class="firstQuarter align-middle">{{$studentGrades->firstQuarter}}</td>
                            <td class="secondQuarter align-middle">{{$studentGrades->secondQuarter}}</td>
                            <td class="thirdQuarter align-middle">{{$studentGrades->thirdQuarter}}</td>
                            <td class="fourthQuarter align-middle"> {{$studentGrades->fourthQuarter}}</td>
                            <td class="average align-middle"></td>
                            <td class=" align-middle"><span class="remarks"></span></td>
                            {{-- <td><span style="color: #8cbd01">Passed</span></td> --}}
                        </tr>
                    @endforeach
                </tbody>
             </table>


             <!-- Completion Status -->
             <div class="row py-3">
                 <div class="col-sm-12">
                    <p class="DivHeaderText d-inline">PAYMENT STATUS ({{$enrolled->typeOfPayment}})</p>
                    <button class="float-right create-button" onclick="window.open('{{ url('account', $enrolled->id) }}')">Print</button>
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

            <div class="row mt-4 mb-2">
                <div class="col-sm-12">
                    <!-- if not enroll -->
                        @if($gradeLevel == 'Grade 1')
                                <button type="button" class="back-button float-right" onclick="window.location='{{ route('Grade1Index') }}'">Back</button>
                        @elseif($gradeLevel == 'Grade 2')
                                <button type="button" class="back-button float-right" onclick="window.location='{{ route('Grade2Index') }}'">Back</button>
                        @elseif($gradeLevel == 'Grade 3')
                                <button type="button" class="back-button float-right" onclick="window.location='{{ route('Grade3Index') }}'">Back</button>
                        @elseif($gradeLevel == 'Grade 4')
                                <button type="button" class="back-button float-right" onclick="window.location='{{ route('Grade4Index') }}'">Back</button>
                        @elseif($gradeLevel == 'Grade 5')
                                <button type="button" class="back-button float-right" onclick="window.location='{{ route('Grade5Index') }}'">Back</button>
                        @elseif($gradeLevel == 'Grade 6')
                                <button type="button" class="back-button float-right" onclick="window.location='{{ route('Grade6Index') }}'">Back</button>
                        @elseif($gradeLevel == 'Grade 7')
                                <button type="button" class="back-button float-right" onclick="window.location='{{ route('Grade7Index') }}'">Back</button>
                        @elseif($gradeLevel == 'Grade 8')
                                <button type="button" class="back-button float-right" onclick="window.location='{{ route('Grade8Index') }}'">Back</button>
                        @elseif($gradeLevel == 'Grade 9')
                                <button type="button" class="back-button float-right" onclick="window.location='{{ route('Grade9Index') }}'">Back</button>
                        @elseif($gradeLevel == 'Grade 10')
                                <button type="button" class="back-button float-right" onclick="window.location='{{ route('Grade10Index') }}'">Back</button>
                        @endif
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
        $('#refund').html(Balance * -1);
    }
    $('.firstQuarter').each(function(){
            var second = parseFloat($(this).closest('tr').find('.secondQuarter').text());  
            var third =  parseFloat($(this).closest('tr').find('.thirdQuarter').text());  
            var fourth =  parseFloat($(this).closest('tr').find('.fourthQuarter').text());  
                var first =  parseFloat($(this).closest('tr').find('.firstQuarter').text()); 

                var total = (first + second + third + fourth) / 4;

                $(this).closest('tr').find('.average').html(total);

        
                if(total >= 74.5){
                    $(this).closest('tr').find('.remarks').html('<span style="color: #8cbd01">Passed</span>');
                }else if(total <= 74.4){
                    $(this).closest('tr').find('.remarks').html('<span style="color: red">Failed</span>');
                }else{
                }
        });
    
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
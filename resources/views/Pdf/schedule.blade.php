<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<head>
    <title>Schedule Pdf</title>
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
                <p class="p-0 m-0" style="color: #676767; font-weight: 800; letter-spacing: 1px; font-size: 25px">{{$classSched->gradeLevel}} ({{$classSched->section}}) CLASS SCHEDULE</p>
                <p class="p-0 m-0" style="color: #d11d27; font-size: 15px; letter-spacing: 1px; font-weight: 600">Schedule for AY {{$classSched->schoolYearFrom}} - {{$classSched->schoolYearTo}}</p>
                <p class="p-0 m-0" style="color: #1e1e1e; font-size: 14px; letter-spacing: 1px; font-weight: 500">@if($classSched->adviserGender == "Male")Mr. @else Ms. @endif{{$classSched->classAdviser}} (Class Adviser)</p>
            </td>
        </tr>
    </table>
    <div class="mb-4 mt-3" style="border-bottom: 3px solid red"></div>
    <table>
        <tr class="text-center">
            <th width="400px" class="pb-3">Monday</th>
            <th width="400px" class="pb-3">Tuesday</th>
            <th width="400px" class="pb-3">Wednesday</th>
            <th width="400px" class="pb-3">Thursday</th>
            <th width="400px" class="pb-3">Friday</th>
        </tr>
        <tr>
            <td>
                @php
                    $mondayCount = 0;
                @endphp
                @foreach ($mondaySched as $mondaySched)
                @php
                    $mondayCount++;
                @endphp
                    <div class="col-sm-12 pt-3" style="border-top: 1px solid #ebebeb">
                        <p class="text-center sub-title" style="color: #1e1e1e">{{$mondaySched->subject}}
                        <small class="d-flex justify-content-center user-role">{{$mondaySched->subjectTeacher}}</small> 
                        <small class="d-flex justify-content-center user-role" style="color: #8cbd01">@if($mondaySched->timeFrom != null)({{\Carbon\Carbon::parse($mondaySched->timeFrom)->format('h:i A') }} to {{\Carbon\Carbon::parse($mondaySched->timeTo)->format('h:i A') }})@else @endif</small> 
                    </div>
                @endforeach
            </td>
            <td>
                @php
                    $teusdayCount = 0;
                @endphp
                @foreach ($teusdaySched as $teusdaySched)
                @php
                    $teusdayCount++;
                @endphp
                    <div class="col-sm-12 pt-3" style="border-top: 1px solid #ebebeb">
                        <p class="text-center sub-title" style="color: #1e1e1e">{{$teusdaySched->subject}}
                        <small class="d-flex justify-content-center user-role">{{$teusdaySched->subjectTeacher}}</small> 
                        <small class="d-flex justify-content-center user-role" style="color: #8cbd01">@if($teusdaySched->timeFrom != null)({{ \Carbon\Carbon::parse($teusdaySched->timeFrom)->format('h:i A') }} to {{\Carbon\Carbon::parse($teusdaySched->timeTo)->format('h:i A') }})@else @endif</small> 
                    </div>
                @endforeach
            </td>
            <td>
                @php
                    $wednesdayCount = 0;
                @endphp
                @foreach ($wednesdaySched as $wednesdaySched)
                @php
                    $wednesdayCount++;
                @endphp
                    <div class="col-sm-12 pt-3" style="border-top: 1px solid #ebebeb">
                        <p class="text-center sub-title" style="color: #1e1e1e">{{$wednesdaySched->subject}}
                        <small class="d-flex justify-content-center user-role">{{$wednesdaySched->subjectTeacher}}</small> 
                        <small class="d-flex justify-content-center user-role" style="color: #8cbd01">@if($wednesdaySched->timeFrom != null)({{ \Carbon\Carbon::parse($wednesdaySched->timeFrom)->format('h:i A') }} to {{\Carbon\Carbon::parse($wednesdaySched->timeTo)->format('h:i A') }})@else @endif</small> 
                    </div>
                @endforeach
            </td>
            <td>
                @php
                    $thursdayCount = 0;
                @endphp
                @foreach ($thursdaySched as $thursdaySched)
                @php
                    $thursdayCount++;
                @endphp
                    <div class="col-sm-12 pt-3" style="border-top: 1px solid #ebebeb">
                        <p class="text-center sub-title" style="color: #1e1e1e">{{$thursdaySched->subject}}
                        <small class="d-flex justify-content-center user-role">{{$thursdaySched->subjectTeacher}}</small> 
                        <small class="d-flex justify-content-center user-role" style="color: #8cbd01">@if($thursdaySched->timeFrom != null)({{ \Carbon\Carbon::parse($thursdaySched->timeFrom)->format('h:i A') }} to {{\Carbon\Carbon::parse($thursdaySched->timeTo)->format('h:i A') }})@else @endif</small> 
                    </div>
                @endforeach
            </td>
            <td>
                @php
                    $fridayCount = 0;
                @endphp
                @foreach ($fridaySched as $fridaySched)
                @php
                    $fridayCount++;
                @endphp
                    <div class="col-sm-12 pt-3" style="border-top: 1px solid #ebebeb">
                        <p class="text-center sub-title" style="color: #1e1e1e">{{$fridaySched->subject}}
                        <small class="d-flex justify-content-center user-role">{{$fridaySched->subjectTeacher}}</small> 
                        <small class="d-flex justify-content-center user-role" style="color: #8cbd01">@if($fridaySched->timeFrom != null)({{ \Carbon\Carbon::parse($fridaySched->timeFrom)->format('h:i A') }} to {{\Carbon\Carbon::parse($fridaySched->timeTo)->format('h:i A') }})@else @endif</small> 
                    </div>
                @endforeach
            </td>
        </tr>
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Grade Pdf</title>
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
                </tr>
            @endforeach
        </tbody>
    </table>
    <p class="text-right" style="font-weight: 700; font-size: 20px; color: #676767">General Average: 100 <span style="color: red">(Failed)</span></p>
    
    
</body>
</html>
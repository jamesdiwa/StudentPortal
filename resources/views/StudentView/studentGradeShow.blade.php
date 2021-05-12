@extends('layouts.master')

@section('content')

@include('layouts.vtabStudent')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title d-inline">My Grade</p>
            <button class="float-right create-button" onclick="window.open({{url('grade',$enrolled->id)}})">Print</button>
        </div>
    </div>
    <div class="container">

                <div class="DivTemplate mt-3 py-3"> 
                    <div class="row my-3">
                        <div class="col-sm-6">
                            <table>
                                <tbody class="tbody-data">
                                    <tr>
                                        <td width="110px" class="font-weight-normal">School Year</td>
                                        <td style="color: #1e1e1e">{{$enrolled->enrolled->schoolYearFrom}}-{{$enrolled->enrolled->schoolYearTo}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-normal">Grade Level</td>
                                        <td style="color: #1e1e1e">{{$enrolled->enrolled->gradeLevel}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-normal">Section</td>
                                        <td style="color: #1e1e1e">{{$enrolled->enrolled->section}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table>
                                <tbody class="tbody-data">
                                    <tr>
                                        <td width="110px" class="font-weight-normal">Adviser</td>
                                        <td style="color: #1e1e1e">@if($enrolled->enrolled->adviserGender == 'Male') Mr. @else Ms. @endif{{$enrolled->enrolled->classAdviser}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-normal">GWA</td>
                                        <td style="color: #1e1e1e">85</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <table class="table table-borderless" id="enrolled{{$enrolled->id}}">
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

                            @foreach ($grades as $studentGrades)
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
                </div>
    </div>
</div>


<script>
    $(document).ready(function(){
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
</script>




@endsection
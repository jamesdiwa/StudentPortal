@extends('layouts.master')

@section('content')

@include('layouts.vtabStudent')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title d-inline">My Class Schedule</p>
            <button class="float-right create-button">Print</button>
        </div>
    </div>
    <div class="container">
        @if(isset($classSched))
        <div class="DivTemplate mt-3 pt-3">
            <div class="row">
                <div class="col-sm-8">
                    <p class="p-0 m-0" style="color: #676767; font-weight: 800; letter-spacing: 1px; font-size: 25px">{{$classSched->gradeLevel}} ({{$classSched->section}}) CLASS SCHEDULE</p>
                    <p class="p-0 m-0" style="color: #d11d27; font-size: 15px; letter-spacing: 1px; font-weight: 600">Schedule for AY {{$classSched->schoolYearFrom}} - {{$classSched->schoolYearTo}}</p>
                    <p class="p-0 m-0" style="color: #1e1e1e; font-size: 14px; letter-spacing: 1px; font-weight: 500">@if($classSched->adviserGender == "Male")Mr. @else Ms. @endif{{$classSched->classAdviser}} (Class Adviser)</p>
                </div>
                <div class="col-sm-4">
                    <div class="p-2" style="background: #fbebd8; min-height: 80px; border-radius: 5px">
                        <p class="p-0 m-0" style="color: #d11d27; font-size: 14px">Notes:</p>
                        <p class="pl-2 p-0 m-0 text-justify" style="color: #d11d27; font-size: 13px">{{$classSched->notes}}</p>
                    </div>

                </div>
            </div>
            <div class="row p-3 mt-2">
                <div class="col-sm">
                    <div class="row p-3" style="background: #ebebeb">
                        <div class="col-sm-12">
                            <p class="text-center sub-title p-0 m-0">Monday</p>
                        </div>
                    </div>
                    <!-- loop here -->
                    <div class="row pb-2 mt-n2">
                     
                        @foreach ($mondaySched as $mondaySched)
                       
                            <div class="col-sm-12 pt-4" style="border-top: 1px solid #ebebeb">
                                <p class="text-center sub-title" style="color: #1e1e1e">{{$mondaySched->subject}}
                                <small class="d-flex justify-content-center user-role">{{$mondaySched->subjectTeacher}}</small> 
                                <small class="d-flex justify-content-center user-role" style="color: #8cbd01">@if($mondaySched->timeFrom != null)({{\Carbon\Carbon::parse($mondaySched->timeFrom)->format('h:i A') }} to {{\Carbon\Carbon::parse($mondaySched->timeTo)->format('h:i A') }})@else @endif</small> 
                            </div>
                        @endforeach
                    </div>

                    <!-- loop ends here -->

                </div>
                <div class="col-sm">
                    <div class="row p-3" style="background: #ebebeb">
                        <div class="col-sm-12">
                            <p class="text-center sub-title p-0 m-0">Tuesday</p>
                        </div>
                    </div>
                    <div class="row pb-2 mt-n2">
                           
                            @foreach ($teusdaySched as $teusdaySched)
                         
                                <div class="col-sm-12 pt-4" style="border-top: 1px solid #ebebeb">
                                    <p class="text-center sub-title" style="color: #1e1e1e">{{$teusdaySched->subject}}
                                    <small class="d-flex justify-content-center user-role">{{$teusdaySched->subjectTeacher}}</small> 
                                    <small class="d-flex justify-content-center user-role" style="color: #8cbd01">@if($teusdaySched->timeFrom != null)({{ \Carbon\Carbon::parse($teusdaySched->timeFrom)->format('h:i A') }} to {{\Carbon\Carbon::parse($teusdaySched->timeTo)->format('h:i A') }})@else @endif</small> 
                                </div>
                            @endforeach
                    </div>
                </div>
                <div class="col-sm">
                    <div class="row p-3" style="background: #ebebeb">
                        <div class="col-sm-12">
                            <p class="text-center sub-title p-0 m-0">Wednesday</p>
                        </div>
                    </div>
                    <div class="row pb-2 mt-n2">
                         
                            @foreach ($wednesdaySched as $wednesdaySched)
                         
                                <div class="col-sm-12 pt-4" style="border-top: 1px solid #ebebeb">
                                    <p class="text-center sub-title" style="color: #1e1e1e">{{$wednesdaySched->subject}}
                                    <small class="d-flex justify-content-center user-role">{{$wednesdaySched->subjectTeacher}}</small> 
                                    <small class="d-flex justify-content-center user-role" style="color: #8cbd01">@if($wednesdaySched->timeFrom != null)({{ \Carbon\Carbon::parse($wednesdaySched->timeFrom)->format('h:i A') }} to {{\Carbon\Carbon::parse($wednesdaySched->timeTo)->format('h:i A') }})@else @endif</small> 
                                </div>
                            @endforeach
                    </div>
                </div>
                <div class="col-sm">
                    <div class="row p-3" style="background: #ebebeb">
                        <div class="col-sm-12">
                            <p class="text-center sub-title p-0 m-0">Thursday</p>
                        </div>
                    </div>
                    <div class="row pb-2 mt-n2">
                     
                        @foreach ($thursdaySched as $thursdaySched)
                      
                            <div class="col-sm-12 pt-4" style="border-top: 1px solid #ebebeb">
                                <p class="text-center sub-title" style="color: #1e1e1e">{{$thursdaySched->subject}}
                                <small class="d-flex justify-content-center user-role">{{$thursdaySched->subjectTeacher}}</small> 
                                <small class="d-flex justify-content-center user-role" style="color: #8cbd01">@if($thursdaySched->timeFrom != null)({{ \Carbon\Carbon::parse($thursdaySched->timeFrom)->format('h:i A') }} to {{\Carbon\Carbon::parse($thursdaySched->timeTo)->format('h:i A') }})@else @endif</small> 
                            </div>
                        @endforeach  
                    </div>
                </div>
                <div class="col-sm">
                    <div class="row p-3" style="background: #ebebeb">
                        <div class="col-sm-12">
                            <p class="text-center sub-title p-0 m-0">Friday</p>
                        </div>
                    </div>
                    <div class="row pb-2 mt-n2">
                        
                        @foreach ($fridaySched as $fridaySched)
                        
                            <div class="col-sm-12 pt-4" style="border-top: 1px solid #ebebeb">
                                <p class="text-center sub-title" style="color: #1e1e1e">{{$fridaySched->subject}}
                                <small class="d-flex justify-content-center user-role">{{$fridaySched->subjectTeacher}}</small> 
                                <small class="d-flex justify-content-center user-role" style="color: #8cbd01">@if($fridaySched->timeFrom != null)({{ \Carbon\Carbon::parse($fridaySched->timeFrom)->format('h:i A') }} to {{\Carbon\Carbon::parse($fridaySched->timeTo)->format('h:i A') }})@else @endif</small> 
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
          @else
          @endif
        </div>

    </div>
</div>

@endsection

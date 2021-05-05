@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">Class Schedule</p>
            <button class="float-right create-button"  onclick="window.location='{{ route('classSchedule.edit',$classSched->id)  }} '">Edit</button>
        </div>
    </div>
    <div class="container">
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
                    <div class="row p-2">
                        @php
                            $mondayCount = 0;
                        @endphp
                        @foreach ($mondaySched as $mondaySched)
                        @php
                             $mondayCount++;
                        @endphp
                            <div class="col-sm-12">
                                <p class="text-center sub-title" style="color: #1e1e1e">{{$mondaySched->subject}}
                                <small class="d-flex justify-content-center user-role">{{$mondaySched->subjectTeacher}}</small> 
                                <small class="d-flex justify-content-center user-role" style="color: #8cbd01">({{$mondaySched->timeFrom}} to {{$mondaySched->timeTo}})</small> 
                            </div>
                        @endforeach

                        @if($mondayCount != 0)
                             <form class="form-horizontal" method="POST" action="{{route('editSchedSubject')}}">
                                @csrf 
                                <input type="hidden" value="{{$classSched->id}}" name="id">
                                <input type="hidden" value="Monday" name="day">

                                <button type="submit" class="edit-button">Edit Schedule</button>
                            </form>
                        @else
                            <form class="form-horizontal" method="POST" action="{{route('createSchedSubject')}}">
                                @csrf 
                                <input type="hidden" value="{{$classSched->gradeLevel}}" name="gradeLevel">
                                <input type="hidden" value="{{$classSched->id}}" name="id">
                                <input type="hidden" value="Monday" name="day">

                                <button type="submit" class="edit-button">Add Schedule</button>
                            </form>
                        @endif
                    </div>

                    <!-- loop ends here -->

                </div>
                <div class="col-sm">
                    <div class="row p-3" style="background: #ebebeb">
                        <div class="col-sm-12">
                            <p class="text-center sub-title p-0 m-0">Tuesday</p>
                        </div>
                    </div>
                    <div class="row p-2">
                            @php
                                $teusdayCount = 0;
                            @endphp
                            @foreach ($teusdaySched as $teusdaySched)
                            @php
                                $teusdayCount++;
                            @endphp
                                <div class="col-sm-12">
                                    <p class="text-center sub-title" style="color: #1e1e1e">{{$teusdaySched->subject}}
                                    <small class="d-flex justify-content-center user-role">{{$teusdaySched->subjectTeacher}}</small> 
                                    <small class="d-flex justify-content-center user-role" style="color: #8cbd01">({{$teusdaySched->timeFrom}} to {{$teusdaySched->timeTo}})</small> 
                                </div>
                            @endforeach

                            @if($teusdayCount != 0)
                                    <button type="button" class="edit-button">Edit Schedule</button>
                            @else
                                <form class="form-horizontal" method="POST" action="{{route('createSchedSubject')}}">
                                    @csrf 
                                    <input type="hidden" value="{{$classSched->gradeLevel}}" name="gradeLevel">
                                    <input type="hidden" value="{{$classSched->id}}" name="id">
                                    <input type="hidden" value="Teusday" name="day">

                                    <button type="submit" class="edit-button">Add Schedule</button>
                                </form>
                            @endif

                    </div>
                </div>
                <div class="col-sm">
                    <div class="row p-3" style="background: #ebebeb">
                        <div class="col-sm-12">
                            <p class="text-center sub-title p-0 m-0">Wednesday</p>
                        </div>
                    </div>
                    <div class="row p-2">
                            @php
                                $wednesdayCount = 0;
                            @endphp
                            @foreach ($wednesdaySched as $wednesdaySched)
                            @php
                                $wednesdayCount++;
                            @endphp
                                <div class="col-sm-12">
                                    <p class="text-center sub-title" style="color: #1e1e1e">{{$wednesdaySched->subject}}
                                    <small class="d-flex justify-content-center user-role">{{$wednesdaySched->subjectTeacher}}</small> 
                                    <small class="d-flex justify-content-center user-role" style="color: #8cbd01">({{$wednesdaySched->timeFrom}} to {{$wednesdaySched->timeTo}})</small> 
                                </div>
                            @endforeach

                            @if($wednesdayCount != 0)
                                    <button type="button" class="edit-button">Edit Schedule</button>
                            @else
                                <form class="form-horizontal" method="POST" action="{{route('createSchedSubject')}}">
                                    @csrf 
                                    <input type="hidden" value="{{$classSched->gradeLevel}}" name="gradeLevel">
                                    <input type="hidden" value="{{$classSched->id}}" name="id">
                                    <input type="hidden" value="Wednesday" name="day">

                                    <button type="submit" class="edit-button">Add Schedule</button>
                                </form>
                            @endif
                    </div>
                </div>
                <div class="col-sm">
                    <div class="row p-3" style="background: #ebebeb">
                        <div class="col-sm-12">
                            <p class="text-center sub-title p-0 m-0">Thursday</p>
                        </div>
                    </div>
                    <div class="row p-2">
                        @php
                            $thursdayCount = 0;
                        @endphp
                        @foreach ($thursdaySched as $thursdaySched)
                        @php
                            $thursdayCount++;
                        @endphp
                            <div class="col-sm-12">
                                <p class="text-center sub-title" style="color: #1e1e1e">{{$thursdaySched->subject}}
                                <small class="d-flex justify-content-center user-role">{{$thursdaySched->subjectTeacher}}</small> 
                                <small class="d-flex justify-content-center user-role" style="color: #8cbd01">({{$thursdaySched->timeFrom}} to {{$thursdaySched->timeTo}})</small> 
                            </div>
                        @endforeach

                        @if($thursdayCount != 0)
                                <button type="button" class="edit-button">Edit Schedule</button>
                        @else
                            <form class="form-horizontal" method="POST" action="{{route('createSchedSubject')}}">
                                @csrf 
                                <input type="hidden" value="{{$classSched->gradeLevel}}" name="gradeLevel">
                                <input type="hidden" value="{{$classSched->id}}" name="id">
                                <input type="hidden" value="Thursday" name="day">

                                <button type="submit" class="edit-button">Add Schedule</button>
                            </form>
                        @endif  
                    </div>
                </div>
                <div class="col-sm">
                    <div class="row p-3" style="background: #ebebeb">
                        <div class="col-sm-12">
                            <p class="text-center sub-title p-0 m-0">Friday</p>
                        </div>
                    </div>
                    <div class="row p-2">
                        @php
                            $fridayCount = 0;
                        @endphp
                        @foreach ($fridaySched as $fridaySched)
                        @php
                            $fridayCount++;
                        @endphp
                            <div class="col-sm-12">
                                <p class="text-center sub-title" style="color: #1e1e1e">{{$fridaySched->subject}}
                                <small class="d-flex justify-content-center user-role">{{$fridaySched->subjectTeacher}}</small> 
                                <small class="d-flex justify-content-center user-role" style="color: #8cbd01">({{$fridaySched->timeFrom}} to {{$fridaySched->timeTo}})</small> 
                            </div>
                        @endforeach

                        @if($fridayCount != 0)
                                <button type="button" class="edit-button">Edit Schedule</button>
                        @else
                            <form class="form-horizontal" method="POST" action="{{route('createSchedSubject')}}">
                                @csrf 
                                <input type="hidden" value="{{$classSched->gradeLevel}}" name="gradeLevel">
                                <input type="hidden" value="{{$classSched->id}}" name="id">
                                <input type="hidden" value="Friday" name="day">

                                <button type="submit" class="edit-button">Add Schedule</button>
                            </form>
                        @endif  
                    </div>
                </div>
            </div>
            {{-- <table class="table table-bordered mt-3">
                <thead class="text-center">
                    <th width="200px">Monday</th>
                    <th width="200px">Tuesday</th>
                    <th width="200px">Wednesday</th>
                    <th width="200px">Thursday</th>
                    <th width="200px">Friday</th>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>
                            Math 1
                            <small class="d-flex justify-content-center user-role">Ms. Aleli Santiago</small> 
                            <small class="d-flex justify-content-center user-role" style="color: #8cbd01">(07:00 am to 8:00 am)</small> 
                        </td>
                        <td>
                            English 1
                            <small class="d-flex justify-content-center user-role">Ms. Aleli Santiago</small>
                            <small class="d-flex justify-content-center user-role" style="color: #8cbd01">(07:00 am to 8:00 am)</small> 
                        </td>
                        <td>
                            Filipino 1
                            <small class="d-flex justify-content-center user-role">Ms. Aleli Santiago</small>
                            <small class="d-flex justify-content-center user-role" style="color: #8cbd01">(07:00 am to 8:00 am)</small> 
                        </td>
                        <td>
                            Music 1
                            <small class="d-flex justify-content-center user-role">Ms. Aleli Santiago</small> 
                            <small class="d-flex justify-content-center user-role" style="color: #8cbd01">(07:00 am to 8:00 am)</small> 
                        </td>
                        <td>
                            Arts 1
                            <small class="d-flex justify-content-center user-role">Ms. Aleli Santiago</small> 
                            <small class="d-flex justify-content-center user-role" style="color: #8cbd01">(07:00 am to 8:00 am)</small> 
                        </td>
                    </tr>
                </tbody>
            </table> --}}
            {{-- <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="submit" class="edit-button">Edit</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('classSchedule.index') }}'">Back</button>
                </div>
            </div> --}}
        </div>

    </div>
</div>

<script>


//     $(document).ready(function(){
//         $('#mondayUpdateSchedBtn').hide();
//         $('#mondayAddSchedBtn').hide();
        
//         $('#teusdayUpdateSchedBtn').hide();
//         $('#teusdayAddSchedBtn').hide();

//         $('#wednesdayUpdateSchedBtn').hide();
//         $('#wednesdayAddSchedBtn').hide();

//         $('#thursdayUpdateSchedBtn').hide();
//         $('#thursdayAddSchedBtn').hide();

//         $('#fridayUpdateSchedBtn').hide();
//         $('#fridayAddSchedBtn').hide();

// //Monday
//         if($('.MondaySchedClass').lenght != 0){
//             $('#mondayUpdateSchedBtn').show();
//         }else{
//             $('#mondayAddSchedBtn').show();
//         }
// //Teusday
//         if($('.TeusdaySchedClass').lenght != 0){
//             $('#teusdayUpdateSchedBtn').show();
//         }else{
//             $('#teusdayAddSchedBtn').show();
//         }

// //Wednesday
//         if($('.WednesdaySchedClass').lenght != 0){
//             $('#wednesdayUpdateSchedBtn').show();
//         }else{
//             $('#wednesdayAddSchedBtn').show();
//         }

// //Thursday
//         if($('.ThursdaySchedClass').lenght != 0){
//             $('#thursdayUpdateSchedBtn').show();
//         }else{
//             $('#thursdayAddSchedBtn').show();
//         }

// //Friday
//         if($('.FridaySchedClass').lenght != 0){
//             $('#fridayUpdateSchedBtn').show();
//         }else{
//             $('#fridayAddSchedBtn').show();
//         }

//     });

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

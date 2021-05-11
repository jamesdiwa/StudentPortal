@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<form class="form-horizontal" method="POST" action="{{route('createSchedSubjectStore')}}">
    @csrf



<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">Class Schedule</p>
        </div>
    </div>
    <div class="container">       
        <div class="DivTemplate mt-3 pt-3">
           <h1>{{$day}} Schedule</h1>
            <div id="mainDiv">
            <input type="hidden" value="{{$id}}" name="id">
            <input type="hidden" value="{{$day}}" name="day">
                    <!-- Day -->
                    <div id="scheduleDiv">
                        <div style="border: 1px solid #d11d27; padding: 10px; border-radius: 5px">
                            <table class="table table-borderless mt-3" id="TimeTable">
                                <thead class="text-center">
                                    <th width="150px">Time From</th>
                                    <th width="150px">Time To</th>
                                    <th width="250px">Subject</th>
                                    <th width="250px">Subject Teacher</th>
                                    <th width="150px">Action</th>
                                </thead> 
                                <tbody >
                                    @php
                                        $count = 0;
                                    @endphp

                                    @foreach($subjects as $subject)
                                    @php
                                        $count++;
                                    @endphp
                                        <tr>
                                            <td><input type="time" name="inputArr[{{$count}}][timeFrom]" id="" class="form-control" ></td>
                                            <td><input type="time" name="inputArr[{{$count}}][timeTo]" id="" class="form-control" ></td>
                                            <td><input type="text" class="form-control subjectValue" name="inputArr[{{$count}}][subject]" value="{{$subject->Subject}}" readOnly/></td>
                                            <td>
                                                <input type="hidden" value="" name="inputArr[{{$count}}][teacherId]" class="teacherId">
                                                <select name="inputArr[{{$count}}][subjectTeacher]"  class="form-control teachers teacherSelect">
                                                    <option value="">Select</option>
                                                    @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->teacherInfo->firstName}} {{$teacher->teacherInfo->lastName}}" data-teacherId="{{$teacher->teacherInfo->id}}" class="{{str_replace(' ', '', $teacher->subjects)}} adviseHide" >{{$teacher->teacherInfo->firstName}} {{$teacher->teacherInfo->lastName}}</option>
                                                    @endforeach
                                                </select>
                                            </td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="form-row mt-4">
                    <div class="form-group col-sm-12">
                        <label class="input-label" style="color: #1e1e1e">Same the schedule to other days</label>

                        @php
                            $mondayCheckboxShow = 0;
                            $teusdayCheckboxShow = 0;
                            $wednesdayCheckboxShow = 0;
                            $thursdayCheckboxShow = 0;
                            $fridayCheckboxShow = 0;

                        @endphp

                        @foreach($mondaySched as $mondaySched)
                            @php
                              $mondayCheckboxShow++;
                            @endphp
                        @endforeach

                        @foreach($teusdaySched as $teusdaySched)
                            @php
                              $teusdayCheckboxShow++;
                            @endphp
                        @endforeach

                        @foreach($wednesdaySched as $wednesdaySched)
                            @php
                             $wednesdayCheckboxShow++;
                            @endphp
                        @endforeach

                        @foreach($thursdaySched as $thursdaySched)
                            @php
                              $thursdayCheckboxShow++;
                            @endphp
                        @endforeach

                        @foreach($fridaySched as $fridaySched)
                            @php
                               $fridayCheckboxShow++;
                            @endphp
                        @endforeach


                        @if($mondayCheckboxShow == 0)  
                            @if($day != "Monday")
                                <div class="form-check ml-3">
                                    <input type="checkbox" class="form-check-input" id="monday" name="mondayCheckbox" value="yes">
                                    <label for="monday" class="form-check-label input-label">Monday</label>
                                </div>
                            @endif
                        @endif
                        @if($teusdayCheckboxShow == 0)  
                            @if($day != "Teusday")
                                <div class="form-check ml-3">
                                    <input type="checkbox" class="form-check-input" id="tuesday" name="teusdayCheckbox" value="yes">
                                    <label for="tuesday" class="form-check-label input-label">Tuesday</label>
                                </div>
                            @endif
                        @endif
                        @if($wednesdayCheckboxShow == 0)  
                            @if($day != "Wednesday")
                            <div class="form-check ml-3">
                                <input type="checkbox" class="form-check-input" id="wednesday" name="wednesdayCheckbox" value="yes">
                                <label for="wednesday" class="form-check-label input-label">Wednesday</label>
                            </div>
                            @endif
                        @endif
                        @if($thursdayCheckboxShow == 0)  
                            @if($day != "Thursday")
                            <div class="form-check ml-3">
                                <input type="checkbox" class="form-check-input" id="thursday" name="thursdayCheckbox" value="yes">
                                <label for="thursday" class="form-check-label input-label">Thursday</label>
                            </div>
                            @endif
                        @endif
                        @if($fridayCheckboxShow == 0)  
                            @if($day != "Friday")
                            <div class="form-check ml-3">
                                <input type="checkbox" class="form-check-input" id="friday" name="fridayCheckbox" value="yes">
                                <label for="friday" class="form-check-label input-label">Friday</label>
                            </div>
                            @endif
                        @endif
                    </div>
                </div>

            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="submit" class="save-button">Save</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('classSchedule.show',$id) }}'">Back</button>
                </div>
            </div>
        </div>

    </div>
</div>
</form>
<script>
   

$(document).ready(function(){
   $('.adviseHide').hide();

   $('.teachers').each(function(){
        var subjectVal = $(this).closest("tr").find('.subjectValue').val().split(" ").join("");
        $(this).closest("tr").find('.'+subjectVal).show();
   });


   $('.teacherSelect').each(function(){
        $(this).change(function(){
                $(this).closest("tr").find('.teacherId').val($(this).find("option:selected").attr('data-teacherId'));
            
        });
    });

});


</script>

@endsection

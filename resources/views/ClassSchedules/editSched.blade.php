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

                                    @foreach($schedSubjects as $schedSubjects)
                                    @php
                                        $count++;
                                    @endphp
                                        <tr>
                                            <td><input type="time" name="inputArr[{{$count}}][timeFrom]" id="" value="{{$schedSubjects->timeFrom}}" class="form-control" ></td>
                                            <td><input type="time" name="inputArr[{{$count}}][timeTo]" id="" value="{{$schedSubjects->timeTo}}" class="form-control" ></td>
                                            <td><input type="text" class="form-control subjectValue" name="inputArr[{{$count}}][subject]" value="{{$schedSubjects->subject}}" readOnly/></td>
                                            <td>
                                                <select name="inputArr[{{$count}}][subjectTeacher]" value="{{$schedSubjects->subjectTeacher}}" class="form-control teachers" onclick="HideAndShowTeacher(this)">
                                                    <option value="">Select</option>
                                                    @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->teacherInfo->firstName}} {{$teacher->teacherInfo->lastName}}" class="{{str_replace(' ', '', $teacher->subjects)}} adviseHide" >{{$teacher->teacherInfo->firstName}} {{$teacher->teacherInfo->lastName}}</option>
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

});

function HideAndShowTeacher(ThisRow){
    var subjectVal = $(ThisRow).closest("tr").find('.subjectValue').val().split(" ").join("");
    // alert(subjectVal);
    $(ThisRow).closest("tr").find('.'+subjectVal).show();
}

</script>

@endsection
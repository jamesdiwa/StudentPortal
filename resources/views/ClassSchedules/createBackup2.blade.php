@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<form class="form-horizontal" method="POST" action="{{route('classSchedule.store')}}">
    @csrf
<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">Class Schedule</p>
        </div>
    </div>
    <div class="container">       
        <div class="DivTemplate mt-3 pt-3">
            <div class="form-row mt-2">
                <div class="form-group col-sm-6">
                    <label class="input-label">Grade Level</label>
                    <select name="gradeLevel" id="gradeLevel" class="form-control" required>
                        <option value="">Select</option>
                        <option value="Grade 1" data-icon="G-1">Grade 1</option>
                        <option value="Grade 2" data-icon="G-2">Grade 2</option>
                        <option value="Grade 3" data-icon="G-3">Grade 3</option>
                        <option value="Grade 4" data-icon="G-4">Grade 4</option>
                        <option value="Grade 5" data-icon="G-5">Grade 5</option>
                        <option value="Grade 6" data-icon="G-6">Grade 6</option>
                        <option value="Grade 7" data-icon="G-7">Grade 7</option>
                        <option value="Grade 8" data-icon="G-8">Grade 8</option>
                        <option value="Grade 9" data-icon="G-9">Grade 9</option>
                        <option value="Grade 10" data-icon="G-10">Grade 10</option>
                    </select>
                    <input type="hidden" value="" name="gradeLevelIcon" id="gradeLevelIcon">
                </div>
                <div class="form-group col-sm-6">
                    <label class="input-label">Section</label>
                    <input type="text" name="section" class="form-control" required>
                </div>
            </div>

            <div class="form-row mt-2">
                <div class="form-group col-sm-6">
                    <label class="input-label">School Year</label>
                    <select class="form-control" type="text" name="schoolYearFrom" placeholder="Year" required>
                        <option value="" disabled selected>From</option>
                        <?php
                        $firstYear = date("Y");
                        $lastYear = 1900;
                        for($i=$firstYear;$i>=$lastYear;$i--){
                        echo '<option value='.$i.'>'.$i.'</option>';}
                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label class="input-label">To</label>
                    <select class="form-control" type="text" name="schoolYearTo" placeholder="Year" required>
                        <option value="" disabled selected>To</option>
                        <?php
                        $firstYear = date("Y");
                        $lastYear = 1900;
                        for($i=$firstYear;$i>=$lastYear;$i--){
                        echo '<option value='.$i.'>'.$i.'</option>';}
                        ?>
                    </select>
                </div>
            </div>
                
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Class Adviser</label>
                    <select name="classAdviser" id="classAdviser" class="form-control">
                        <option value="">Select</option>
                        @foreach($teachers as $teacher)
                        <option value="" class="{{$teacher->department}} adviseHide">{{$teacher->firstName}} {{$teacher->middleName}} {{$teacher->lastName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Additional Notes</label>
                    <textarea name="notes" id="" rows="3" class="form-control"></textarea>
                </div>
            </div>
        <div id="mainDiv">
            <!-- Day -->
            <div id="scheduleDiv">
                <div style="border: 1px solid #d11d27; padding: 10px; border-radius: 5px">
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label class="input-label" style="color: #1e1e1e">Day</label>
                            <div class="form-check ml-3">
                                <input type="checkbox" class="form-check-input" id="monday" checked>
                                <label for="monday" class="form-check-label input-label">Monday</label>
                            </div>
                            <div class="form-check ml-3">
                                <input type="checkbox" class="form-check-input" id="tuesday" checked>
                                <label for="tuesday" class="form-check-label input-label">Tuesday</label>
                            </div>
                            <div class="form-check ml-3">
                                <input type="checkbox" class="form-check-input" id="wednesday" checked>
                                <label for="wednesday" class="form-check-label input-label">Wednesday</label>
                            </div>
                            <div class="form-check ml-3">
                                <input type="checkbox" class="form-check-input" id="thursday" checked>
                                <label for="thursday" class="form-check-label input-label">Thursday</label>
                            </div>
                            <div class="form-check ml-3">
                                <input type="checkbox" class="form-check-input" id="friday" checked>
                                <label for="friday" class="form-check-label input-label">Friday</label>
                            </div>
                        </div>
                    </div>
                    <table class="table table-borderless mt-3">
                        <thead class="text-center">
                            <th width="150px">Time From</th>
                            <th width="150px">Time To</th>
                            <th width="250px">Subject</th>
                            <th width="250px">Subject Teacher</th>
                            <th width="150px">Action</th>
                        </thead>
                        <tbody id="timeFields">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        
            <button type="button" class="edit-button mt-2" style="width: 100%" id="addSchedule">Add Schedule</button>
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="submit" class="save-button">Save</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('classSchedule.index') }}'">Back</button>
                </div>
            </div>
        </div>

    </div>
</div>
</form>
<script>
   

$(document).ready(function(){
    $('#scheduleDiv').hide();
    $('#addSchedule').hide();
    gradeLevelSelect();


    $("#addSchedule").click(function(){
        var divClone = $('#scheduleDiv').clone();
        $('#mainDiv').append(divClone);

    });
   
});



//Onchange of Selection of Grade
function gradeLevelSelect(){
    $('#gradeLevel').change(function(){
        if($('#gradeLevel').val() == 'Grade 1'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'))
            $("#timeFields tr").remove();
            Grade1SubjectsFunction();
            $('#scheduleDiv').show();
            $('#addSchedule').show();
        }else if($('#gradeLevel').val() == 'Grade 2'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));
            $("#timeFields tr").remove();
            Grade2SubjectsFunction();
            $('#scheduleDiv').show();
            $('#addSchedule').show();
        }else if($('#gradeLevel').val() == 'Grade 3'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));
            $("#timeFields tr").remove();
            Grade3SubjectsFunction();
            $('#scheduleDiv').show();
            $('#addSchedule').show();
        }else if($('#gradeLevel').val() == 'Grade 4'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));
            $("#timeFields tr").remove();
            Grade4SubjectsFunction()
            $('#scheduleDiv').show();
            $('#addSchedule').show();
        }else if($('#gradeLevel').val() == 'Grade 5'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));
            $("#timeFields tr").remove();
            Grade5SubjectsFunction();
            $('#scheduleDiv').show();
            $('#addSchedule').show();
        }else if($('#gradeLevel').val() == 'Grade 6'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));
           alert('wala pa to.');
           $("#timeFields tr").remove();
           $("#gradeLevel").prop("selectedIndex", 0).change();
        }else if($('#gradeLevel').val() == 'Grade 7'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));
            alert('wala pa to.');
           $("#timeFields tr").remove();
           $("#gradeLevel").prop("selectedIndex", 0).change();
        }else if($('#gradeLevel').val() == 'Grade 8'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));
            alert('wala pa to.');
           $("#timeFields tr").remove();
           $("#gradeLevel").prop("selectedIndex", 0).change();
        }else if($('#gradeLevel').val() == 'Grade 9'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));
            alert('wala pa to.');
           $("#timeFields tr").remove();
           $("#gradeLevel").prop("selectedIndex", 0).change();
        }else if($('#gradeLevel').val() == 'Grade 10'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));
            alert('wala pa to.');
           $("#timeFields tr").remove();
           $("#gradeLevel").prop("selectedIndex", 0).change();
        }else{
            $('#gradeLevelIcon').val('');
            $("#timeFields tr").remove();
            $('#addSchedule').hide();
        }
    });
}
    
//Grade1 Subjects
function Grade1SubjectsFunction(){
    $("#timeFields").append(
            '<tr>'+
                '<td><input type="time" name="inputArr[1][timeFrom]" id="" class="form-control" ></td>'+
                '<td><input type="time" name="inputArr[1][timeTo]" id="" class="form-control" ></td>'+
                '<td><input type="text" class="form-control" name="inputArr[1][subject]" value="Mother Tongue" readOnly/></td>'+
                '<td>'+
                    '<select name="inputArr[1][subjectTeacher]" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g1MotherTongue as $g1MotherTongue)'+
                        '<option value="{{$g1MotherTongue->teacherInfo->firstName}} {{$g1MotherTongue->teacherInfo->lastName}}">{{$g1MotherTongue->teacherInfo->firstName}} {{$g1MotherTongue->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="inputArr[2][timeFrom]" id="" class="form-control"></td>'+
                '<td><input type="time" name="inputArr[2][timeTo]" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" name="inputArr[2][subject]" value="Filipino 1" readOnly/></td>'+
                '<td>'+
                    '<select name="inputArr[2][subjectTeacher]" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g1Filipino1 as $g1Filipino1)'+
                        '<option value="{{$g1Filipino1->teacherInfo->firstName}} {{$g1Filipino1->teacherInfo->lastName}}">{{$g1Filipino1->teacherInfo->firstName}} {{$g1Filipino1->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="inputArr[3][timeFrom]" id="" class="form-control"></td>'+
                '<td><input type="time" name="inputArr[3][timeTo]" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" name="inputArr[3][subject]" value="English 1" readOnly/></td>'+
                '<td>'+
                    '<select name="inputArr[3][subjectTeacher]" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g1English1 as $g1English1)'+
                        '<option value="{{$g1English1->teacherInfo->firstName}} {{$g1English1->teacherInfo->lastName}}">{{$g1English1->teacherInfo->firstName}} {{$g1English1->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="inputArr[4][timeFrom]" id="" class="form-control"></td>'+
                '<td><input type="time" name="inputArr[4][timeTo]" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" name="inputArr[4][subject]" value="Math 1" readOnly/></td>'+
                '<td>'+
                    '<select name="inputArr[4][subjectTeacher]" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g1Math1 as $g1Math1)'+
                        '<option value="{{$g1Math1->teacherInfo->firstName}} {{$g1Math1->teacherInfo->lastName}}">{{$g1Math1->teacherInfo->firstName}} {{$g1Math1->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="inputArr[5][timeFrom]" id="" class="form-control"></td>'+
                '<td><input type="time" name="inputArr[5][timeTo]" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" name="inputArr[5][subject]" value="Science 1" readOnly/></td>'+
                '<td>'+
                    '<select name="inputArr[5][subjectTeacher]" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g1Science1 as $g1Science1)'+
                        '<option value="{{$g1Science1->teacherInfo->firstName}} {{$g1Science1->teacherInfo->lastName}}">{{$g1Science1->teacherInfo->firstName}} {{$g1Science1->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="inputArr[6][timeFrom]" id="" class="form-control"></td>'+
                '<td><input type="time" name="inputArr[6][timeTo]" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" name="inputArr[6][subject]" value="Araling Panlipunan 1" readOnly/></td>'+
                '<td>'+
                    '<select name="inputArr[6][subjectTeacher]" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g1AralingPanlipunan1 as $g1AralingPanlipunan1)'+
                        '<option value="{{$g1AralingPanlipunan1->teacherInfo->firstName}} {{$g1AralingPanlipunan1->teacherInfo->lastName}}">{{$g1AralingPanlipunan1->teacherInfo->firstName}} {{$g1AralingPanlipunan1->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="inputArr[7][timeFrom]" id="" class="form-control"></td>'+
                '<td><input type="time" name="inputArr[7][timeTo]" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" name="inputArr[7][subject]" value="Mapeh 1" readOnly/></td>'+
                '<td>'+
                    '<select name="inputArr[7][subjectTeacher]" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g1Mapeh1 as $g1Mapeh1)'+
                        '<option value="{{$g1Mapeh1->teacherInfo->firstName}} {{$g1Mapeh1->teacherInfo->lastName}}">{{$g1Mapeh1->teacherInfo->firstName}} {{$g1Mapeh1->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="inputArr[8][timeFrom]" id="" class="form-control"></td>'+
                '<td><input type="time" name="inputArr[8][timeTo]" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" name="inputArr[8][subject]" value="Edukasyon sa Pagpapakatao 1" readOnly/></td>'+
                '<td>'+
                    '<select name="inputArr[8][subjectTeacher]" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g1EdukasyonsaPagpapakatao1 as $g1EdukasyonsaPagpapakatao1)'+
                        '<option value="{{$g1EdukasyonsaPagpapakatao1->teacherInfo->firstName}} {{$g1EdukasyonsaPagpapakatao1->teacherInfo->lastName}}">{{$g1EdukasyonsaPagpapakatao1->teacherInfo->firstName}} {{$g1EdukasyonsaPagpapakatao1->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>');
}


//Grade2 Subjects
function Grade2SubjectsFunction(){
    $("#timeFields").append(
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Mother Tongue 2" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g2MotherTongue2 as $g2MotherTongue2)'+
                        '<option value="">{{$g2MotherTongue2->teacherInfo->firstName}} {{$g2MotherTongue2->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Filipino 2" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g2Filipino2 as $g2Filipino2)'+
                        '<option value="">{{$g2Filipino2->teacherInfo->firstName}} {{$g2Filipino2->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="English 2" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g2English2 as $g2English2)'+
                        '<option value="">{{$g2English2->teacherInfo->firstName}} {{$g2English2->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Math 2" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g2Math2 as $g2Math2)'+
                        '<option value="">{{$g2Math2->teacherInfo->firstName}} {{$g2Math2->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Science 2" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g2Science2 as $g2Science2)'+
                        '<option value="">{{$g2Science2->teacherInfo->firstName}} {{$g2Science2->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Araling Panlipunan 2" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g2AralingPanlipunan2 as $g2AralingPanlipunan2)'+
                        '<option value="">{{$g2AralingPanlipunan2->teacherInfo->firstName}} {{$g2AralingPanlipunan2->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Mapeh 2" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g2Mapeh2 as $g2Mapeh2)'+
                        '<option value="">{{$g2Mapeh2->teacherInfo->firstName}} {{$g2Mapeh2->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Edukasyon sa Pagpapakatao 2" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g2EdukasyonsaPagpapakatao2 as $g2EdukasyonsaPagpapakatao2)'+
                        '<option value="">{{$g2EdukasyonsaPagpapakatao2->teacherInfo->firstName}} {{$g2EdukasyonsaPagpapakatao2->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>');
}

//Grade3 Subjects
function Grade3SubjectsFunction(){
    $("#timeFields").append(
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Mother Tongue 3" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g3MotherTongue3 as $g3MotherTongue3)'+
                        '<option value="">{{$g3MotherTongue3->teacherInfo->firstName}} {{$g3MotherTongue3->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Filipino 3" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g3Filipino3 as $g3Filipino3)'+
                        '<option value="">{{$g3Filipino3->teacherInfo->firstName}} {{$g3Filipino3->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="English 3" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g3English3 as $g3English3)'+
                        '<option value="">{{$g3English3->teacherInfo->firstName}} {{$g3English3->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Math 3" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g3Math3 as $g3Math3)'+
                        '<option value="">{{$g3Math3->teacherInfo->firstName}} {{$g3Math3->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Science 3" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g3Science3 as $g3Science3)'+
                        '<option value="">{{$g3Science3->teacherInfo->firstName}} {{$g3Science3->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Araling Panlipunan 3" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g3AralingPanlipunan3 as $g3AralingPanlipunan3)'+
                        '<option value="">{{$g3AralingPanlipunan3->teacherInfo->firstName}} {{$g3AralingPanlipunan3->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Mapeh 3" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g3Mapeh3 as $g3Mapeh3)'+
                        '<option value="">{{$g3Mapeh3->teacherInfo->firstName}} {{$g3Mapeh3->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Edukasyon sa Pagpapakatao 3" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g3EdukasyonsaPagpapakatao3 as $g3EdukasyonsaPagpapakatao3)'+
                        '<option value="">{{$g3EdukasyonsaPagpapakatao3->teacherInfo->firstName}} {{$g3EdukasyonsaPagpapakatao3->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>');
}

//Grade4 Subjects
function Grade4SubjectsFunction(){
    $("#timeFields").append(
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Filipino 4" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g4Filipino4 as $g4Filipino4)'+
                        '<option value="">{{$g4Filipino4->teacherInfo->firstName}} {{$g4Filipino4->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="English 4" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g4English4 as $g4English4)'+
                        '<option value="">{{$g4English4->teacherInfo->firstName}} {{$g4English4->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Math 4" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g4Math4 as $g4Math4)'+
                        '<option value="">{{$g4Math4->teacherInfo->firstName}} {{$g4Math4->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Science 4" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g4Science4 as $g4Science4)'+
                        '<option value="">{{$g4Science4->teacherInfo->firstName}} {{$g4Science4->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Araling Panlipunan 4" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g4AralingPanlipunan4 as $g4AralingPanlipunan4)'+
                        '<option value="">{{$g4AralingPanlipunan4->teacherInfo->firstName}} {{$g4AralingPanlipunan4->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Mapeh 4" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g4Mapeh4 as $g4Mapeh4)'+
                        '<option value="">{{$g4Mapeh4->teacherInfo->firstName}} {{$g4Mapeh4->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Edukasyon sa Pagpapakatao 4" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g4EdukasyonsaPagpapakatao4 as $g4EdukasyonsaPagpapakatao4)'+
                        '<option value="">{{$g4EdukasyonsaPagpapakatao4->teacherInfo->firstName}} {{$g4EdukasyonsaPagpapakatao4->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Edukasyong Pantahanan at Pangkabuhayan 4" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g4EdukasyongPantahananatPangkabuhayan4 as $g4EdukasyongPantahananatPangkabuhayan4)'+
                        '<option value="">{{$g4EdukasyongPantahananatPangkabuhayan4->teacherInfo->firstName}} {{$g4EdukasyongPantahananatPangkabuhayan4->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>');
}

//Grade5 Subjects
function Grade5SubjectsFunction(){
    $("#timeFields").append(
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Filipino 5" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g5Filipino5 as $g5Filipino5)'+
                        '<option value="">{{$g5Filipino5->teacherInfo->firstName}} {{$g5Filipino5->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="English 5" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g5English5 as $g5English5)'+
                        '<option value="">{{$g5English5->teacherInfo->firstName}} {{$g5English5->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Math 5" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g5Math5 as $g5Math5)'+
                        '<option value="">{{$g5Math5->teacherInfo->firstName}} {{$g5Math5->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Science 5" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g5Science5 as $g5Science5)'+
                        '<option value="">{{$g5Science5->teacherInfo->firstName}} {{$g5Science5->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Araling Panlipunan 5" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g5AralingPanlipunan5 as $g5AralingPanlipunan5)'+
                        '<option value="">{{$g5AralingPanlipunan5->teacherInfo->firstName}} {{$g5AralingPanlipunan5->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Mapeh 5" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g5Mapeh5 as $g5Mapeh5)'+
                        '<option value="">{{$g5Mapeh5->teacherInfo->firstName}} {{$g5Mapeh5->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Edukasyon sa Pagpapakatao 5" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g5EdukasyonsaPagpapakatao5 as $g5EdukasyonsaPagpapakatao5)'+
                        '<option value="">{{$g5EdukasyonsaPagpapakatao5->teacherInfo->firstName}} {{$g5EdukasyonsaPagpapakatao5->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>'+
            '<tr>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="time" name="" id="" class="form-control"></td>'+
                '<td><input type="text" class="form-control" value="Edukasyong Pantahanan at Pangkabuhayan 5" readOnly/></td>'+
                '<td>'+
                    '<select name="" class="form-control teachers">'+
                        '<option value="">Select</option>'+
                        '@foreach($g5EdukasyongPantahananatPangkabuhayan5 as $g5EdukasyongPantahananatPangkabuhayan5)'+
                        '<option value="">{{$g5EdukasyongPantahananatPangkabuhayan5->teacherInfo->firstName}} {{$g5EdukasyongPantahananatPangkabuhayan5->teacherInfo->lastName}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td>'+
            '</tr>');
}

</script>

@endsection

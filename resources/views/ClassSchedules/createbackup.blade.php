@extends('layouts.master')

@section('content')

@include('layouts.vtab')

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
                    <select name="" id="gradeLevel" class="form-control">
                        <option value="">Select</option>
                        <option value="Grade 1">Grade 1</option>
                        <option value="Grade 2">Grade 2</option>
                        <option value="Grade 3">Grade 3</option>
                        <option value="Grade 4">Grade 4</option>
                        <option value="Grade 5">Grade 5</option>
                        <option value="Grade 6">Grade 6</option>
                        <option value="Grade 7">Grade 7</option>
                        <option value="Grade 8">Grade 8</option>
                        <option value="Grade 9">Grade 9</option>
                        <option value="Grade 10">Grade 10</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label class="input-label">Section</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">School Year</label>
                    <select name="" id="" class="form-control">
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Class Adviser</label>
                    <select name="" id="classAdviser" class="form-control">
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
                    <textarea name="" id="" rows="3" class="form-control"></textarea>
                </div>
            </div>
            <!-- Day -->
            <div id="scheduleDiv">
                <div style="border: 1px solid #d11d27; padding: 10px; border-radius: 5px">
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label class="input-label" style="color: #1e1e1e">Day</label>
                            <div class="form-check ml-3">
                                <input type="checkbox" class="form-check-input" id="monday">
                                <label for="monday" class="form-check-label input-label">Monday</label>
                            </div>
                            <div class="form-check ml-3">
                                <input type="checkbox" class="form-check-input" id="tuesday">
                                <label for="tuesday" class="form-check-label input-label">Tuesday</label>
                            </div>
                            <div class="form-check ml-3">
                                <input type="checkbox" class="form-check-input" id="wednesday">
                                <label for="wednesday" class="form-check-label input-label">Wednesday</label>
                            </div>
                            <div class="form-check ml-3">
                                <input type="checkbox" class="form-check-input" id="thursday">
                                <label for="thursday" class="form-check-label input-label">Thursday</label>
                            </div>
                            <div class="form-check ml-3">
                                <input type="checkbox" class="form-check-input" id="friday">
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
                            {{-- <tr>
                                <td>
                                    <input type="time" name="" id="" class="form-control">
                                </td>
                                <td>
                                    <input type="time" name="" id="" class="form-control">
                                </td>
                                <td>
                                    <select name="" class="form-control selectSubject" onchange="hideShowTeachersSub(this)">
                                        <option value="" >Select Subject</option>
                                        <option value="Mother Tongue" class="thisHide grade1">Mother Tongue</option>
                                        <option value="Filipino 1" class="thisHide grade1">Filipino 1</option>
                                        <option value="English 1" class="thisHide grade1">English 1</option>
                                        <option value="Math 1" class="thisHide grade1">Math 1</option>
                                        <option value="Science 1" class="thisHide grade1">Science 1</option>
                                        <option value="Araling Panlipunan 1" class="thisHide grade1">Araling Panlipunan 1</option>
                                        <option value="Mapeh 1" class="thisHide grade1">Mapeh 1</option>
                                        <option value="Edukasyon sa Pagpapakatao 2" class="thisHide grade1">Edukasyon sa Pagpapakatao 1</option>
                                        <option value="Mother Tongue 2" class="thisHide grade2">Mother Tongue 2</option>
                                        <option value="Filipino 2" class="thisHide grade2">Filipino 2</option>
                                        <option value="English 2" class="thisHide grade2">English 2</option>
                                        <option value="Math 2" class="thisHide grade2">Math 2</option>
                                        <option value="Science 2" class="thisHide grade2">Science 2</option>
                                        <option value="Araling Panlipunan 2" class="thisHide grade2">Araling Panlipunan 2</option>
                                        <option value="Mapeh 2" class="thisHide grade2">Mapeh 2</option>
                                        <option value="Edukasyon sa Pagpapakatao 2"class="thisHide grade2">Edukasyon sa Pagpapakatao 2</option>
                                        <option value="Mother Tongue 3" class="thisHide grade3">Mother Tongue 3</option>
                                        <option value="Filipino 3" class="thisHide grade3">Filipino 3</option>
                                        <option value="English 3" class="thisHide grade3">English 3</option>
                                        <option value="Math 3" class="thisHide grade3">Math 3</option>
                                        <option value="Science 3" class="thisHide grade3">Science 3</option>
                                        <option value="Araling Panlipunan 3" class="thisHide grade3">Araling Panlipunan 3</option>
                                        <option value="Mapeh 3" class="thisHide grade3">Mapeh 3</option>
                                        <option value="Edukasyon sa Pagpapakatao 3" class="thisHide grade3">Edukasyon sa Pagpapakatao 3</option>
                                        <option value="Filipino 4" class="thisHide grade4">Filipino 4</option>
                                        <option value="English 4" class="thisHide grade4">English 4</option>
                                        <option value="Math 4" class="thisHide grade4">Math 4</option>
                                        <option value="Science 4" class="thisHide grade4">Science 4</option>
                                        <option value="Araling Panlipunan 4" class="thisHide grade4">Araling Panlipunan 4</option>
                                        <option value="Mapeh 4" class="thisHide grade4">Mapeh 4</option>
                                        <option value="Edukasyon sa Pagpapakatao 4" class="thisHide grade4">Edukasyon sa Pagpapakatao 4</option>
                                        <option value="Edukasyong Pantahanan at Pangkabuhayan 4" class="thisHide grade4">Edukasyong Pantahanan at Pangkabuhayan 4</option>
                                        <option value="Filipino 5" class="thisHide grade5">Filipino 5</option>
                                        <option value="English 5" class="thisHide grade5">English 5</option>
                                        <option value="Math 5" class="thisHide grade5">Math 5</option>
                                        <option value="Science 5" class="thisHide grade5">Science 5</option>
                                        <option value="Araling Panlipunan 5" class="thisHide grade5">Araling Panlipunan 5</option>
                                        <option value="Mapeh 5" class="thisHide grade5">Mapeh 5</option>
                                        <option value="Edukasyon sa Pagpapakatao 5" class="thisHide grade5">Edukasyon sa Pagpapakatao 5</option>
                                        <option value="Edukasyong Pantahanan at Pangkabuhayan 5" class="thisHide grade5">Edukasyong Pantahanan at Pangkabuhayan 5</option>
                                        <option value="Filipino 6" class="thisHide grade6">Filipino 6</option>
                                        <option value="English 6" class="thisHide grade6">English 6</option>
                                        <option value="Math 6" class="thisHide grade6">Math 6</option>
                                        <option value="Science 6" class="thisHide grade6">Science 6</option>
                                        <option value="Araling Panlipunan 6" class="thisHide grade6">Araling Panlipunan 6</option>
                                        <option value="Mapeh 6" class="thisHide grade6">Mapeh 6</option>
                                        <option value="Edukasyon sa Pagpapakatao 6" class="thisHide grade6">Edukasyon sa Pagpapakatao 6</option>
                                        <option value="Edukasyong Pantahanan at Pangkabuhayan 6" class="thisHide grade6">Edukasyong Pantahanan at Pangkabuhayan 6</option>
                                        <option value="Filipino 7" class="thisHide grade7">Filipino 7</option>
                                        <option value="English 7" class="thisHide grade7">English 7</option>
                                        <option value="Math 7" class="thisHide grade7">Math 7</option>
                                        <option value="Science 7" class="thisHide grade7">Science 7</option>
                                        <option value="Araling Panlipunan 7" class="thisHide grade7">Araling Panlipunan 7</option>
                                        <option value="Mapeh 7" class="thisHide grade7">Mapeh 7</option>
                                        <option value="Edukasyon sa Pagpapakatao 7" class="thisHide grade7">Edukasyon sa Pagpapakatao 7</option>
                                        <option value="TLE 7" class="thisHide grade7">TLE 7</option>
                                        <option value="Filipino 8" class="thisHide grade8">Filipino 8</option>
                                        <option value="English 8" class="thisHide grade8">English 8</option>
                                        <option value="Math 8" class="thisHide grade8">Math 8</option>
                                        <option value="Science 8" class="thisHide grade8">Science 8</option>
                                        <option value="Araling Panlipunan 8" class="thisHide grade8">Araling Panlipunan 8</option>
                                        <option value="Mapeh 8" class="thisHide grade8">Mapeh 8</option>
                                        <option value="Edukasyon sa Pagpapakatao 8" class="thisHide grade8">Edukasyon sa Pagpapakatao 8</option>
                                        <option value="TLE 9" class="thisHide grade9">TLE 9</option>
                                        <option value="Filipino 9" class="thisHide grade9">Filipino 9</option>
                                        <option value="English 9" class="thisHide grade9">English 9</option>
                                        <option value="Math 9" class="thisHide grade9">Math 9</option>
                                        <option value="Science 9" class="thisHide grade9">Science 9</option>
                                        <option value="Araling Panlipunan 9" class="thisHide grade9">Araling Panlipunan 9</option>
                                        <option value="Mapeh 9" class="thisHide grade9">Mapeh 9</option>
                                        <option value="Edukasyon sa Pagpapakatao 9" class="thisHide grade9">Edukasyon sa Pagpapakatao 9</option>
                                        <option value="TLE 9" class="thisHide grade9">TLE 9</option>
                                        <option value="Filipino 10"class="thisHide grade10">Filipino 10</option>
                                        <option value="English 10" class="thisHide grade10">English 10</option>
                                        <option value="Math 10" class="thisHide grade10">Math 10</option>
                                        <option value="Science 10" class="thisHide grade10">Science 10</option>
                                        <option value="Araling Panlipunan 10" class="thisHide grade10">Araling Panlipunan 10</option>
                                        <option value="Mapeh 10" class="thisHide grade10">Mapeh 10</option>
                                        <option value="Edukasyon sa Pagpapakatao 10" class="thisHide grade10">Edukasyon sa Pagpapakatao 10</option>
                                        <option value="TLE 10" class="thisHide grade10">TLE 10</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="" class="form-control teachers">
                                        <option value="">Select</option>
                                        @foreach($teachersSubs as $teachersSubs)
                                        <option value="" class="{{str_replace(' ', '', $teachersSubs->subjects)}} teachersHide">{{$teachersSubs->teacherInfo->firstName}} {{$teachersSubs->teacherInfo->lastName}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td></td>
                            </tr> --}}
                        </tbody>
                    </table>
                    <div class="form-row">
                        <div class="form-group col-sm-12 d-flex justify-content-center">
                            <button type="button" id="addTime" class="create-button">Add</button>
                        </div>
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

<script>
   

$(document).ready(function(){
    // $('.thisHide').hide();
    // $('.adviseHide').hide();
    // $('.teachersHide').hide();

    gradeLevelSelect();
    // addTimeFunction();
    // hideShowTeachersSub();

    // $("#timeFields").on('click','.remove',function(){
    //     $(this).parent().parent().remove();
    // });
});



// function gradeLevelSelect(){
//     $('#gradeLevel').change(function(){
//         gradeLevelShowHide();
//     });
// }

// function gradeLevelSelect(){
//     if($('#gradeLevel').val() == 'Grade 1'){
//             $("#classAdviser").prop("selectedIndex", 0).change();
//             $(".selectSubject").prop("selectedIndex", 0).change();
            
//             $('.thisHide').hide();
//             $('.grade1').show();
//             $('.High').hide();
//             $('.Elementary').show();
//         }else if($('#gradeLevel').val() == 'Grade 2'){
//             $("#classAdviser").prop("selectedIndex", 0).change();
//             $(".selectSubject").prop("selectedIndex", 0).change();

//             $('.thisHide').hide();
//             $('.grade2').show();
//             $('.High').hide();
//             $('.Elementary').show();
//         }else if($('#gradeLevel').val() == 'Grade 3'){
//             $("#classAdviser").prop("selectedIndex", 0).change();
//             $(".selectSubject").prop("selectedIndex", 0).change();

//             $('.thisHide').hide();
//             $('.grade3').show();
//             $('.High').hide();
//             $('.Elementary').show();
//         }else if($('#gradeLevel').val() == 'Grade 4'){
//             $("#classAdviser").prop("selectedIndex", 0).change();
//             $(".selectSubject").prop("selectedIndex", 0).change();

//             $('.thisHide').hide();
//             $('.grade4').show();
//             $('.High').hide();
//             $('.Elementary').show();
//         }else if($('#gradeLevel').val() == 'Grade 5'){
//             $("#classAdviser").prop("selectedIndex", 0).change();
//             $(".selectSubject").prop("selectedIndex", 0).change();

//             $('.thisHide').hide();
//             $('.grade5').show();
//             $('.High').hide();
//             $('.Elementary').show();
//         }else if($('#gradeLevel').val() == 'Grade 6'){
//             $("#classAdviser").prop("selectedIndex", 0).change();
//             $(".selectSubject").prop("selectedIndex", 0).change();

//             $('.thisHide').hide();
//             $('.grade6').show();
//             $('.High').hide();
//             $('.Elementary').show();
//         }else if($('#gradeLevel').val() == 'Grade 7'){
//             $("#classAdviser").prop("selectedIndex", 0).change();
//             $(".selectSubject").prop("selectedIndex", 0).change();

//             $('.thisHide').hide();
//             $('.grade7').show();
//             $('.Elementary').hide();
//             $('.High').show();
//         }else if($('#gradeLevel').val() == 'Grade 8'){
//             $("#classAdviser").prop("selectedIndex", 0).change();
//             $(".selectSubject").prop("selectedIndex", 0).change();

//             $('.thisHide').hide();
//             $('.grade8').show();
//             $('.Elementary').hide();
//             $('.High').show();
//         }else if($('#gradeLevel').val() == 'Grade 9'){
//             $("#classAdviser").prop("selectedIndex", 0).change();
//             $(".selectSubject").prop("selectedIndex", 0).change();

//             $('.thisHide').hide();
//             $('.grade9').show();
//             $('.Elementary').hide();
//             $('.High').show();
//         }else if($('#gradeLevel').val() == 'Grade 10'){
//             $("#classAdviser").prop("selectedIndex", 0).change();
//             $(".selectSubject").prop("selectedIndex", 0).change();

//             $('.thisHide').hide();
//             $('.grade10').show();
//             $('.Elementary').hide();
//             $('.High').show();
//         }
// }

// function gradeLevelShowWhenSubChange(){
//     if($('#gradeLevel').val() == 'Grade 1'){
//             $('.thisHide').hide();
//             $('.grade1').show();
//             $('.High').hide();
//             $('.Elementary').show();
//         }else if($('#gradeLevel').val() == 'Grade 2'){
//             $('.thisHide').hide();
//             $('.grade2').show();
//             $('.High').hide();
//             $('.Elementary').show();
//         }else if($('#gradeLevel').val() == 'Grade 3'){
//             $('.thisHide').hide();
//             $('.grade3').show();
//             $('.High').hide();
//             $('.Elementary').show();
//         }else if($('#gradeLevel').val() == 'Grade 4'){
//             $('.thisHide').hide();
//             $('.grade4').show();
//             $('.High').hide();
//             $('.Elementary').show();
//         }else if($('#gradeLevel').val() == 'Grade 5'){
//             $('.thisHide').hide();
//             $('.grade5').show();
//             $('.High').hide();
//             $('.Elementary').show();
//         }else if($('#gradeLevel').val() == 'Grade 6'){
//             $('.thisHide').hide();
//             $('.grade6').show();
//             $('.High').hide();
//             $('.Elementary').show();
//         }else if($('#gradeLevel').val() == 'Grade 7'){
//             $('.thisHide').hide();
//             $('.grade7').show();
//             $('.Elementary').hide();
//             $('.High').show();
//         }else if($('#gradeLevel').val() == 'Grade 8'){
//             $('.thisHide').hide();
//             $('.grade8').show();
//             $('.Elementary').hide();
//             $('.High').show();
//         }else if($('#gradeLevel').val() == 'Grade 9'){
//             $('.thisHide').hide();
//             $('.grade9').show();
//             $('.Elementary').hide();
//             $('.High').show();
//         }else if($('#gradeLevel').val() == 'Grade 10'){
//             $('.thisHide').hide();
//             $('.grade10').show();
//             $('.Elementary').hide();
//             $('.High').show();
//         }
// }


// function hideShowTeachersSub(thisBtn){
//         var thisValSub = $(thisBtn).val().split(" ").join("");
        
//         if(thisValSub != ''){
//             $(thisBtn).closest("tr").find('.teachers').prop("selectedIndex", 0).change();
//             $(thisBtn).closest("tr").find('.teachersHide').hide();
//             $(thisBtn).closest("tr").find('.'+thisValSub).show();
//         }
// }


// function addTimeFunction(){

//  $("#addTime").click(function(){
// 		$("#timeFields").append('<tr><td><input type="time" name="" id="" class="form-control"></td><td><input type="time" name="" id="" class="form-control"></td><td>'+
//             ' <select name="" class="form-control selectSubject" hideShowTeachersSub(this)>'+
//                 '<option value="" >Select Subject</option>'+
//                 '<option value="Mother Tongue" class="thisHide grade1">Mother Tongue</option>'+
//                 '<option value="Filipino 1" class="thisHide grade1">Filipino 1</option>'+
//                 '<option value="English 1" class="thisHide grade1">English 1</option>'+
//                 '<option value="Math 1" class="thisHide grade1">Math 1</option>'+
//                 '<option value="Science 1" class="thisHide grade1">Science 1</option>'+
//                 '<option value="Araling Panlipunan 1" class="thisHide grade1">Araling Panlipunan 1</option>'+
//                 '<option value="Mapeh 1" class="thisHide grade1">Mapeh 1</option>'+
//                 '<option value="Edukasyon sa Pagpapakatao 2" class="thisHide grade1">Edukasyon sa Pagpapakatao 1</option>'+
//                 '<option value="Mother Tongue 2" class="thisHide grade2">Mother Tongue 2</option>'+
//                 '<option value="Filipino 2" class="thisHide grade2">Filipino 2</option>'+
//                 '<option value="English 2" class="thisHide grade2">English 2</option>'+
//                 '<option value="Math 2" class="thisHide grade2">Math 2</option>'+
//                 '<option value="Science 2" class="thisHide grade2">Science 2</option>'+
//                 '<option value="Araling Panlipunan 2" class="thisHide grade2">Araling Panlipunan 2</option>'+
//                 '<option value="Mapeh 2" class="thisHide grade2">Mapeh 2</option>'+
//                 '<option value="Edukasyon sa Pagpapakatao 2"class="thisHide grade2">Edukasyon sa Pagpapakatao 2</option>'+
//                 '<option value="Mother Tongue 3" class="thisHide grade3">Mother Tongue 3</option>'+
//                 '<option value="Filipino 3" class="thisHide grade3">Filipino 3</option>'+
//                 '<option value="English 3" class="thisHide grade3">English 3</option>'+
//                 '<option value="Math 3" class="thisHide grade3">Math 3</option>'+
//                 '<option value="Science 3" class="thisHide grade3">Science 3</option>'+
//                 '<option value="Araling Panlipunan 3" class="thisHide grade3">Araling Panlipunan 3</option>'+
//                 '<option value="Mapeh 3" class="thisHide grade3">Mapeh 3</option>'+
//                 '<option value="Edukasyon sa Pagpapakatao 3" class="thisHide grade3">Edukasyon sa Pagpapakatao 3</option>'+
//                 '<option value="Filipino 4" class="thisHide grade4">Filipino 4</option>'+
//                 '<option value="English 4" class="thisHide grade4">English 4</option>'+
//                 '<option value="Math 4" class="thisHide grade4">Math 4</option>'+
//                 '<option value="Science 4" class="thisHide grade4">Science 4</option>'+
//                 '<option value="Araling Panlipunan 4" class="thisHide grade4">Araling Panlipunan 4</option>'+
//                 '<option value="Mapeh 4" class="thisHide grade4">Mapeh 4</option>'+
//                 '<option value="Edukasyon sa Pagpapakatao 4" class="thisHide grade4">Edukasyon sa Pagpapakatao 4</option>'+
//                 '<option value="Edukasyong Pantahanan at Pangkabuhayan 4" class="thisHide grade4">Edukasyong Pantahanan at Pangkabuhayan 4</option>'+
//                 '<option value="Filipino 5" class="thisHide grade5">Filipino 5</option>'+
//                 '<option value="English 5" class="thisHide grade5">English 5</option>'+
//                 '<option value="Math 5" class="thisHide grade5">Math 5</option>'+
//                 '<option value="Science 5" class="thisHide grade5">Science 5</option>'+
//                 '<option value="Araling Panlipunan 5" class="thisHide grade5">Araling Panlipunan 5</option>'+
//                 '<option value="Mapeh 5" class="thisHide grade5">Mapeh 5</option>'+
//                 '<option value="Edukasyon sa Pagpapakatao 5" class="thisHide grade5">Edukasyon sa Pagpapakatao 5</option>'+
//                 '<option value="Edukasyong Pantahanan at Pangkabuhayan 5" class="thisHide grade5">Edukasyong Pantahanan at Pangkabuhayan 5</option>'+
//                 '<option value="Filipino 6" class="thisHide grade6">Filipino 6</option>'+
//                 '<option value="English 6" class="thisHide grade6">English 6</option>'+
//                 '<option value="Math 6" class="thisHide grade6">Math 6</option>'+
//                 '<option value="Science 6" class="thisHide grade6">Science 6</option>'+
//                 '<option value="Araling Panlipunan 6" class="thisHide grade6">Araling Panlipunan 6</option>'+
//                 '<option value="Mapeh 6" class="thisHide grade6">Mapeh 6</option>'+
//                 '<option value="Edukasyon sa Pagpapakatao 6" class="thisHide grade6">Edukasyon sa Pagpapakatao 6</option>'+
//                 '<option value="Edukasyong Pantahanan at Pangkabuhayan 6" class="thisHide grade6">Edukasyong Pantahanan at Pangkabuhayan 6</option>'+
//                 '<option value="Filipino 7" class="thisHide grade7">Filipino 7</option>'+
//                 '<option value="English 7" class="thisHide grade7">English 7</option>'+
//                 '<option value="Math 7" class="thisHide grade7">Math 7</option>'+
//                 '<option value="Science 7" class="thisHide grade7">Science 7</option>'+
//                 '<option value="Araling Panlipunan 7" class="thisHide grade7">Araling Panlipunan 7</option>'+
//                 '<option value="Mapeh 7" class="thisHide grade7">Mapeh 7</option>'+
//                 '<option value="Edukasyon sa Pagpapakatao 7" class="thisHide grade7">Edukasyon sa Pagpapakatao 7</option>'+
//                 '<option value="TLE 7" class="thisHide grade7">TLE 7</option>'+
//                 '<option value="Filipino 8" class="thisHide grade8">Filipino 8</option>'+
//                 '<option value="English 8" class="thisHide grade8">English 8</option>'+
//                 '<option value="Math 8" class="thisHide grade8">Math 8</option>'+
//                 '<option value="Science 8" class="thisHide grade8">Science 8</option>'+
//                 '<option value="Araling Panlipunan 8" class="thisHide grade8">Araling Panlipunan 8</option>'+
//                 '<option value="Mapeh 8" class="thisHide grade8">Mapeh 8</option>'+
//                 '<option value="Edukasyon sa Pagpapakatao 8" class="thisHide grade8">Edukasyon sa Pagpapakatao 8</option>'+
//                 '<option value="TLE 9" class="thisHide grade9">TLE 9</option>'+
//                 '<option value="Filipino 9" class="thisHide grade9">Filipino 9</option>'+
//                 '<option value="English 9" class="thisHide grade9">English 9</option>'+
//                 '<option value="Math 9" class="thisHide grade9">Math 9</option>'+
//                 '<option value="Science 9" class="thisHide grade9">Science 9</option>'+
//                 '<option value="Araling Panlipunan 9" class="thisHide grade9">Araling Panlipunan 9</option>'+
//                 '<option value="Mapeh 9" class="thisHide grade9">Mapeh 9</option>'+
//                 '<option value="Edukasyon sa Pagpapakatao 9" class="thisHide grade9">Edukasyon sa Pagpapakatao 9</option>'+
//                 '<option value="TLE 9" class="thisHide grade9">TLE 9</option>'+
//                 '<option value="Filipino 10"class="thisHide grade10">Filipino 10</option>'+
//                 '<option value="English 10" class="thisHide grade10">English 10</option>'+
//                 '<option value="Math 10" class="thisHide grade10">Math 10</option>'+
//                 '<option value="Science 10" class="thisHide grade10">Science 10</option>'+
//                 '<option value="Araling Panlipunan 10" class="thisHide grade10">Araling Panlipunan 10</option>'+
//                 '<option value="Mapeh 10" class="thisHide grade10">Mapeh 10</option>'+
//                 '<option value="Edukasyon sa Pagpapakatao 10" class="thisHide grade10">Edukasyon sa Pagpapakatao 10</option>'+
//                 '<option value="TLE 10" class="thisHide grade10">TLE 10</option>'+
//             '</select>'+
//             '</td><td>'+
//                 '<select name="" class="form-control teachers">'+
//                     '<option value="">Select</option>'+
//                     '@foreach($teachersSubs2 as $teachersSubs2)'+
//                     '<option value="" class="{{str_replace(' ', '', $teachersSubs2->subjects)}} teachersHide">{{$teachersSubs2->teacherInfo->firstName}} {{$teachersSubs2->teacherInfo->lastName}}</option>'+
//                     '@endforeach'+
//                     '</select>'+
//             '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td></tr>');
//             gradeLevelShowWhenSubChange();
// 	});
// }


// $("#addSchedule").click(function(){
// 		$("#scheduleDiv").append('<div class="mt-2" style="border: 1px solid #d11d27; padding: 10px; border-radius: 5px"><div class="form-row"><div class="form-group col-sm-12"><label class="input-label" style="color: #1e1e1e">Day</label><div class="form-check ml-3"><input type="checkbox" class="form-check-input" id=""><label for="" class="form-check-label input-label">Monday</label></div><div class="form-check ml-3"><input type="checkbox" class="form-check-input" id=""><label for="" class="form-check-label input-label">Tuesday</label></div><div class="form-check ml-3"><input type="checkbox" class="form-check-input" id=""><label for="" class="form-check-label input-label">Wednesday</label></div><div class="form-check ml-3"><input type="checkbox" class="form-check-input" id=""><label for="" class="form-check-label input-label">Thursday</label></div><div class="form-check ml-3"><input type="checkbox" class="form-check-input" id=""><label for="" class="form-check-label input-label">Friday</label></div></div></div><table class="table table-borderless mt-3"><thead class="text-center"><th width="150px">Time From</th><th width="150px">Time To</th><th width="250px">Subject</th><th width="250px">Subject Teacher</th><th width="150px">Action</th></thead><tbody id="timeFields"><tr><td><input type="time" name="" id="" class="form-control"></td><td><input type="time" name="" id="" class="form-control"></td><td>'+
//             '</select></td><td><select name="" id="" class="form-control"><option value=""></option></select></td><td></td></tr></tbody></table><div class="form-row"><div class="form-group col-sm-12 d-flex justify-content-center"><button type="button" id="addTime" class="create-button">Add</button></div></div></div>');
// 	});




//Onchange of Selection of Grade

function gradeLevelSelect(){
    if($('#gradeLevel').val() == 'Grade 1'){
        Grade1SubjectsFunction();
        }else if($('#gradeLevel').val() == 'Grade 2'){
          
        }else if($('#gradeLevel').val() == 'Grade 3'){
           
        }else if($('#gradeLevel').val() == 'Grade 4'){
           
        }else if($('#gradeLevel').val() == 'Grade 5'){
           
        }else if($('#gradeLevel').val() == 'Grade 6'){
           
        }else if($('#gradeLevel').val() == 'Grade 7'){
          
        }else if($('#gradeLevel').val() == 'Grade 8'){
          
        }else if($('#gradeLevel').val() == 'Grade 9'){
           
        }else if($('#gradeLevel').val() == 'Grade 10'){
          
        }
}
    




//Grade1 Subjects
   
function Grade1SubjectsFunction(){
    $("#timeFields").append('<tr><td><input type="time" name="" id="" class="form-control"></td><td><input type="time" name="" id="" class="form-control"></td><td>'+
            ' <select name="" class="form-control selectSubject" hideShowTeachersSub(this)>'+
                '<option value="" >Select Subject</option>'+
                '<option value="Mother Tongue" class="thisHide grade1">Mother Tongue</option>'+
                '<option value="Filipino 1" class="thisHide grade1">Filipino 1</option>'+
                '<option value="English 1" class="thisHide grade1">English 1</option>'+
                '<option value="Math 1" class="thisHide grade1">Math 1</option>'+
                '<option value="Science 1" class="thisHide grade1">Science 1</option>'+
                '<option value="Araling Panlipunan 1" class="thisHide grade1">Araling Panlipunan 1</option>'+
                '<option value="Mapeh 1" class="thisHide grade1">Mapeh 1</option>'+
            '</select>'+
            '</td><td>'+
                '<select name="" class="form-control teachers">'+
                    '<option value="">Select</option>'+
                    '@foreach($teachersSubs2 as $teachersSubs2)'+
                    '<option value="" class="{{str_replace(' ', '', $teachersSubs->subjects)}} teachersHide">{{$teachersSubs->teacherInfo->firstName}} {{$teachersSubs->teacherInfo->lastName}}</option>'+
                    '@endforeach'+
                    '</select>'+
            '</td><td class="text-center align-middle"><button href="javascript:void(0);" class="delete-button remove">Remove</button></td></tr>');
}

</script>

@endsection

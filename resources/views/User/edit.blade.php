@extends('layouts.master')

@section('content')


<style>
    #teacher_div {
    display: none;
}
#grade1-subjects, #grade2-subjects, #grade3-subjects, #grade4-subjects, #grade5-subjects, #grade6-subjects, #grade7-subjects, #grade8-subjects, #grade9-subjects, #grade10-subjects{
    display: block;
}
</style>
<link href="{{ asset('css/croppie.css') }}" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('js/croppie.js') }}" defer></script>

@include('layouts.cropImageModal')
@include('layouts.vtab')


<form class="form-horizontal" method="POST" action="{{route('user.update',$user->id)}}">
    @csrf
    @method('PUT')
    <div class="content content-margin pb-2" id="content">
        <div class="row header-bg" style="margin-top: 70px">
            <div class="col-sm-12">
                <p class="header-title">User Management</p>
            </div>
        </div>
        <div class="container">
            <div class="DivTemplate mt-3 py-3">
                <p class="DivHeaderText pb-2 mb-2">LOG IN DETAILS</p>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label class="input-label">Username</label>
                        <input type="text" class="form-control required {{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{$user->username}}" readonly>
                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                {{-- <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label class="input-label">Password</label>
                        <input type="password" class="form-control required {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="input-label">Confirm Password</label>
                        <input type="password" class="form-control required" id='confirm-password' name="confirm-password">
                    </div>
                </div> --}}
                @if($user->accountType != 'Student')
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label class="input-label">Account Type</label>
                        <select class="form-control" name="accountType" id="accountType" onchange="showDiv(this)" value="{{$user->accountType}}" required>
                            <option value="Admin">Admin</option>
                            <option value="Teacher">Teacher</option>
                        </select>
                    </div>
                </div>
                @else
                    <input type="hidden" value="Student" name="accountType">
                
                @endif

                <p class="DivHeaderText my-2 py-2">BASIC INFORMATION</p>
                <div class="form-row">
                    <div class="form-group col-sm-4">
                        <label class="input-label">First Name</label>
                        <input type="text" class="form-control" name="firstName" value="{{$user->firstName}}" required>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="input-label">Middle Name</label>
                        <input type="text" class="form-control" name="middleName" value="{{$user->middleName}}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="input-label">Last Name</label>
                        <input type="text" class="form-control" name="lastName" value="{{$user->lastName}}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-8">
                        <label class="input-label">Date of Birth</label>
                        <div class="form-row mb-n3">
                            <div class="form-group col-sm-4">
                                <select class="form-control" name="month" required id="month">
                                    <option value="" disabled selected>Month</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select> 
                            </div>
                            <div class="form-group col-sm-4">
                                <input class="form-control" name="day" pattern="^\d*(\d{0})?$" type="text" placeholder="Day" value="{{$user->day}}" required>
                            </div>
                            <div class="form-group col-sm-4">
                                <select class="form-control" type="text" name="year" placeholder="Year" id="year" required>
                                <option value="" disabled selected>Year</option>
                                <?php
                                $firstYear = date("Y");
                                $lastYear = 1900;
                                for($i=$firstYear;$i>=$lastYear;$i--){
                                echo '<option value='.$i.'>'.$i.'</option>';}
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="input-label mb-2">Gender</label><br>
                        <div class="form-check form-check-inline ml-4">
                            <input type="radio" name="gender" id="genderMale" value="Male" class="form-check-input" @if($user->gender == 'Male') checked @endif>
                            <label for="genderMale" class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline ml-4">
                            <input type="radio" name="gender" id="genderFemale" value="Female" class="form-check-input" @if($user->gender == 'Female') checked @endif>
                            <label for="genderFemale" class="form-check-label">Female</label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label class="input-label">Permanent Address</label>
                        <textarea name="permanentAddress" id="" rows="3" class="form-control" required>{{$user->permanentAddress}}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label class="input-label">Present Address</label>
                        <textarea name="presentAddress" id="" rows="3" class="form-control">{{$user->presentAddress}}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label class="input-label">Email Address</label>
                        <input type="email" class="form-control" value="{{$user->email}}" name="email" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label class="input-label">Contact Number</label>
                        <input type="number" pattern="/^-?\d+\.?\d*$/" class="form-control" onKeyPress="if(this.value.length==11) return false;" value="{{$user->contactNumber}}" name="contactNumber" required>
                    </div>
                </div>
                <div id="teacher_div">
                    <p class="DivHeaderText my-2 py-2">SCHOOL RELATED INFORMATION</p>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label class="input-label">Department</label>
                            <select name="department" id="department" class="form-control">
                                <option value="">Select</option>
                                <option value="Elementary">Elementary</option>
                                <option value="High School">High School</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label class="input-label">Grade Level</label>
                            <select name="gradeLevel" id="gradeLevel" class="form-control">
                                <option value="">Select</option>
                                <option value="Grade 1" class="elementary glevelhide">Grade 1</option>
                                <option value="Grade 2" class="elementary glevelhide">Grade 2</option>
                                <option value="Grade 3" class="elementary glevelhide">Grade 3</option>
                                <option value="Grade 4" class="elementary glevelhide">Grade 4</option>
                                <option value="Grade 5" class="elementary glevelhide">Grade 5</option>
                                <option value="Grade 6" class="elementary glevelhide">Grade 6</option>
                                <option value="Grade 7" class="highSchool glevelhide">Grade 7</option>
                                <option value="Grade 8" class="highSchool glevelhide">Grade 8</option>
                                <option value="Grade 9" class="highSchool glevelhide">Grade 9</option>
                                <option value="Grade 10" class="highSchool glevelhide">Grade 10</option>
                            </select>
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class="form-group col-sm-12">
                            <label class="input-label">Subjects</label>
                            <select name="subjects[]" id='subjects' class='select2-dropdown' multiple='multiple' data-placeholder='Select subject(s)...'>
                                    <option value="Mother Tongue">Mother Tongue</option>
                                    <option value="Filipino 1">Filipino 1</option>
                                    <option value="English 1">English 1</option>
                                    <option value="Math 1">Math 1</option>
                                    <option value="Science 1">Science 1</option>
                                    <option value="Araling Panlipunan 1">Araling Panlipunan 1</option>
                                    <option value="Mapeh 1">Mapeh 1</option>
                                    <option value="Edukasyon sa Pagpapakatao 1">Edukasyon sa Pagpapakatao 1</option>
                                    <option value="Mother Tongue 2">Mother Tongue 2</option>
                                    <option value="Filipino 2">Filipino 2</option>
                                    <option value="English 2">English 2</option>
                                    <option value="Math 2">Math 2</option>
                                    <option value="Science 2">Science 2</option>
                                    <option value="Araling Panlipunan 2">Araling Panlipunan 2</option>
                                    <option value="Mapeh 2">Mapeh 2</option>
                                    <option value="Edukasyon sa Pagpapakatao 2">Edukasyon sa Pagpapakatao 2</option>
                                    <option value="Mother Tongue 3">Mother Tongue 3</option>
                                    <option value="Filipino 3">Filipino 3</option>
                                    <option value="English 3">English 3</option>
                                    <option value="Math 3">Math 3</option>
                                    <option value="Science 3">Science 3</option>
                                    <option value="Araling Panlipunan 3">Araling Panlipunan 3</option>
                                    <option value="Mapeh 3">Mapeh 3</option>
                                    <option value="Edukasyon sa Pagpapakatao 3">Edukasyon sa Pagpapakatao 3</option>
                                    <option value="Filipino 4">Filipino 4</option>
                                    <option value="English 4">English 4</option>
                                    <option value="Math 4">Math 4</option>
                                    <option value="Science 4">Science 4</option>
                                    <option value="Araling Panlipunan 4">Araling Panlipunan 4</option>
                                    <option value="Mapeh 4">Mapeh 4</option>
                                    <option value="Edukasyon sa Pagpapakatao 4">Edukasyon sa Pagpapakatao 4</option>
                                    <option value="Edukasyong Pantahanan at Pangkabuhayan 4">Edukasyong Pantahanan at Pangkabuhayan 4</option>
                                    <option value="Filipino 5">Filipino 5</option>
                                    <option value="English 5">English 5</option>
                                    <option value="Math 5">Math 5</option>
                                    <option value="Science 5">Science 5</option>
                                    <option value="Araling Panlipunan 5">Araling Panlipunan 5</option>
                                    <option value="Mapeh 5">Mapeh 5</option>
                                    <option value="Edukasyon sa Pagpapakatao 5">Edukasyon sa Pagpapakatao 5</option>
                                    <option value="Edukasyong Pantahanan at Pangkabuhayan 5">Edukasyong Pantahanan at Pangkabuhayan 5</option>
                                    <option value="Filipino 6">Filipino 6</option>
                                    <option value="English 6">English 6</option>
                                    <option value="Math 6">Math 6</option>
                                    <option value="Science 6">Science 6</option>
                                    <option value="Araling Panlipunan 6">Araling Panlipunan 6</option>
                                    <option value="Mapeh 6">Mapeh 6</option>
                                    <option value="Edukasyon sa Pagpapakatao 6">Edukasyon sa Pagpapakatao 6</option>
                                    <option value="Edukasyong Pantahanan at Pangkabuhayan 6">Edukasyong Pantahanan at Pangkabuhayan 6</option>
                                    <option value="Filipino 7">Filipino 7</option>
                                    <option value="English 7">English 7</option>
                                    <option value="Math 7">Math 7</option>
                                    <option value="Science 7">Science 7</option>
                                    <option value="Araling Panlipunan 7">Araling Panlipunan 7</option>
                                    <option value="Mapeh 7">Mapeh 7</option>
                                    <option value="Edukasyon sa Pagpapakatao 7">Edukasyon sa Pagpapakatao 7</option>
                                    <option value="TLE 7">TLE 7</option>
                                    <option value="Filipino 8">Filipino 8</option>
                                    <option value="English 8">English 8</option>
                                    <option value="Math 8">Math 8</option>
                                    <option value="Science 8">Science 8</option>
                                    <option value="Araling Panlipunan 8">Araling Panlipunan 8</option>
                                    <option value="Mapeh 8">Mapeh 8</option>
                                    <option value="Edukasyon sa Pagpapakatao 8">Edukasyon sa Pagpapakatao 8</option>
                                    <option value="TLE 9">TLE 9</option>
                                    <option value="Filipino 9">Filipino 9</option>
                                    <option value="English 9">English 9</option>
                                    <option value="Math 9">Math 9</option>
                                    <option value="Science 9">Science 9</option>
                                    <option value="Araling Panlipunan 9">Araling Panlipunan 9</option>
                                    <option value="Mapeh 9">Mapeh 9</option>
                                    <option value="Edukasyon sa Pagpapakatao 9">Edukasyon sa Pagpapakatao 9</option>
                                    <option value="TLE 9">TLE 9</option>
                                    <option value="Filipino 10">Filipino 10</option>
                                    <option value="English 10">English 10</option>
                                    <option value="Math 10">Math 10</option>
                                    <option value="Science 10">Science 10</option>
                                    <option value="Araling Panlipunan 10">Araling Panlipunan 10</option>
                                    <option value="Mapeh 10">Mapeh 10</option>
                                    <option value="Edukasyon sa Pagpapakatao 10">Edukasyon sa Pagpapakatao 10</option>
                                    <option value="TLE 10">TLE 10</option>
                            </select>
                            <input type="hidden" id='idSelectValue' value="@foreach($userSubjects as $userSubjects){{$userSubjects->subjects ?? ''}},@endforeach" class='form-control'>
                        </div>
                    </div>
                </div>
                <p class="DivHeaderText py-2 my-2">UPLOAD PHOTO</p>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="p-3">
                            <div class="d-flex justify-content-center">
                                <img id='photoDisplay' class='mx-auto' src='{{ $user->photoPath!=null ? asset('images/UserPhoto/'.$user->photoPath) : asset('images/1.jpg') }}' style="width: 150px; height: 150px">
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <input type="file" name="userPhoto" id="user_photo" accept="image/*" style="width: 210px"> 
                            </div>
                            <input type="hidden" id='photoSaving' name="photoPath"  class='form-control'>
                                
                            {{-- <input type="hidden" id='photoSaving' name="picture" class='form-control {{ $errors->has('patientPhoto') ? ' is-invalid' : '' }}'>
                            @if ($errors->has('patientPhoto'))
                            <span class="mx-auto d-block invalid-feedback" style='width: 50%' role="alert">
                                <strong>{{ $errors->first('patientPhoto') }}</strong>
                            </span>
                            @endif --}}
                        </div>
                    </div>
                </div>
                <div class="row mt-3 mb-2">
                    <div class="col-sm-12">
                        <button type="submit" class="save-button">Save</button>
                        <button type="button" class="back-button float-right" onclick="window.location='{{ route('user.index') }}'">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>

$(document).ready(function(){

$('#subjects').select2({
    width: '100%',
    allowClear: true,
});

    var selectedValues = $('#idSelectValue').val().split(',');
    $("#subjects").val(selectedValues).trigger("change");
    $("#department option[value='{{$user->department}}']").attr("selected", "selected");
    $("#gradeLevel option[value='{{$user->gradeLevel}}']").attr("selected", "selected");

    if($('#department').val() == 'Elementary'){
        $('.glevelhide').hide();
        $('.elementary').show();
    }else{
        $('.glevelhide').hide();
        $('.highSchool').show();
    }


    $("#accountType option[value='{{$user->accountType}}']").attr("selected", "selected");
    $("#month option[value='{{$user->month}}']").attr("selected", "selected");
    $("#year option[value='{{$user->year}}']").attr("selected", "selected");

    var accountType = '{{$user->accountType}}';
    if(accountType == 'Teacher'){
       $('#teacher_div').show();
    }

    $('#department').change(function(){
        if($('#department').val() == 'Elementary'){
            $('.glevelhide').hide();
            $('.elementary').show();
            $("#gradeLevel").prop("selectedIndex", 0).change();
        }else{
            $('.glevelhide').hide();
            $('.highSchool').show();
            $("#gradeLevel").prop("selectedIndex", 0).change();
        }
    });

       //Crop image
      $image_crop = $('#image_demo').croppie({
                    enableExif: true,
                    viewport: {
                    width:200,
                    height:200,
                    type:'square' //circle
                    },
                    boundary:{
                    width:300,
                    height:300
                    }
                });
    
                $('#user_photo').on('change', function(){
                    var reader = new FileReader();
                    reader.onload = function (event) {
                     $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });
                    }
                    reader.readAsDataURL(this.files[0]);
                    $('#uploadimageModal').modal('show');
                });
    
                $('.crop_image').click(function(event){
                    $image_crop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                    }).then(function(response){
                    $('#photoDisplay').attr('src', response);
                    $("#photoSaving").val(response);
                    $('#uploadimageModal').modal('hide');
                    })
                });
              
        $(function () {
              $("#user_photo").change(function () {
                  readURL(this);
              });
          });
    
          function readURL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function (e) {
                      //alert(e.target.result);
                      $('#Photo').attr('src', e.target.result);
                  };
    
                  reader.readAsDataURL(input.files[0]);
              }
          }
    });

function showDiv(select){
   if(select.value== "Teacher"){
    document.getElementById('teacher_div').style.display = "block";
   } 
   else {
    document.getElementById('teacher_div').style.display = "none";
   }
} 
       
function subjectShow(select){
   if(select.value=="All Subjects"){
        $('#grade1-subjects').show();
        $('#grade2-subjects').show();
        $('#grade3-subjects').show();
        $('#grade4-subjects').show();
        $('#grade5-subjects').show();
        $('#grade6-subjects').show();
        $('#grade7-subjects').show();
        $('#grade8-subjects').show();
        $('#grade9-subjects').show();
        $('#grade10-subjects').show();
    } 
    else if(select.value=="Grade 1"){
        $('#grade1-subjects').show();
        $('#grade2-subjects').hide();
        $('#grade3-subjects').hide();
        $('#grade4-subjects').hide();
        $('#grade5-subjects').hide();
        $('#grade6-subjects').hide();
        $('#grade7-subjects').hide();
        $('#grade8-subjects').hide();
        $('#grade9-subjects').hide();
        $('#grade10-subjects').hide();
    }
    else if(select.value=="Grade 2"){
        $('#grade1-subjects').hide();
        $('#grade2-subjects').show();
        $('#grade3-subjects').hide();
        $('#grade4-subjects').hide();
        $('#grade5-subjects').hide();
        $('#grade6-subjects').hide();
        $('#grade7-subjects').hide();
        $('#grade8-subjects').hide();
        $('#grade9-subjects').hide();
        $('#grade10-subjects').hide();
    }
    else if(select.value=="Grade 3"){
        $('#grade1-subjects').hide();
        $('#grade2-subjects').hide();
        $('#grade3-subjects').show();
        $('#grade4-subjects').hide();
        $('#grade5-subjects').hide();
        $('#grade6-subjects').hide();
        $('#grade7-subjects').hide();
        $('#grade8-subjects').hide();
        $('#grade9-subjects').hide();
        $('#grade10-subjects').hide();
    }
    else if(select.value=="Grade 4"){
        $('#grade1-subjects').hide();
        $('#grade2-subjects').hide();
        $('#grade3-subjects').hide();
        $('#grade4-subjects').show();
        $('#grade5-subjects').hide();
        $('#grade6-subjects').hide();
        $('#grade7-subjects').hide();
        $('#grade8-subjects').hide();
        $('#grade9-subjects').hide();
        $('#grade10-subjects').hide();
    }
    else if(select.value=="Grade 5"){
        $('#grade1-subjects').hide();
        $('#grade2-subjects').hide();
        $('#grade3-subjects').hide();
        $('#grade4-subjects').hide();
        $('#grade5-subjects').show();
        $('#grade6-subjects').hide();
        $('#grade7-subjects').hide();
        $('#grade8-subjects').hide();
        $('#grade9-subjects').hide();
        $('#grade10-subjects').hide();
    }
    else if(select.value=="Grade 6"){
        $('#grade1-subjects').hide();
        $('#grade2-subjects').hide();
        $('#grade3-subjects').hide();
        $('#grade4-subjects').hide();
        $('#grade5-subjects').hide();
        $('#grade6-subjects').show();
        $('#grade7-subjects').hide();
        $('#grade8-subjects').hide();
        $('#grade9-subjects').hide();
        $('#grade10-subjects').hide();
    }
    else if(select.value=="Grade 7"){
        $('#grade1-subjects').hide();
        $('#grade2-subjects').hide();
        $('#grade3-subjects').hide();
        $('#grade4-subjects').hide();
        $('#grade5-subjects').hide();
        $('#grade6-subjects').hide();
        $('#grade7-subjects').show();
        $('#grade8-subjects').hide();
        $('#grade9-subjects').hide();
        $('#grade10-subjects').hide();
    }
    else if(select.value=="Grade 8"){
        $('#grade1-subjects').hide();
        $('#grade2-subjects').hide();
        $('#grade3-subjects').hide();
        $('#grade4-subjects').hide();
        $('#grade5-subjects').hide();
        $('#grade6-subjects').hide();
        $('#grade7-subjects').hide();
        $('#grade8-subjects').show();
        $('#grade9-subjects').hide();
        $('#grade10-subjects').hide();
    }
    else if(select.value=="Grade 9"){
        $('#grade1-subjects').hide();
        $('#grade2-subjects').hide();
        $('#grade3-subjects').hide();
        $('#grade4-subjects').hide();
        $('#grade5-subjects').hide();
        $('#grade6-subjects').hide();
        $('#grade7-subjects').hide();
        $('#grade8-subjects').hide();
        $('#grade9-subjects').show();
        $('#grade10-subjects').hide();
    }
    else{
        $('#grade1-subjects').hide();
        $('#grade2-subjects').hide();
        $('#grade3-subjects').hide();
        $('#grade4-subjects').hide();
        $('#grade5-subjects').hide();
        $('#grade6-subjects').hide();
        $('#grade7-subjects').hide();
        $('#grade8-subjects').hide();
        $('#grade9-subjects').hide();
        $('#grade10-subjects').show();
    }
}       
</script>

@endsection
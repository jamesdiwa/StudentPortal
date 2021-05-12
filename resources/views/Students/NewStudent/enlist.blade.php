@extends('layouts.master')

@section('content')
<link href="{{ asset('css/croppie.css') }}" rel="stylesheet" />
<script type="text/javascript" src="{{ asset('js/croppie.js') }}" defer></script>

@include('layouts.cropImageModal')
@include('layouts.vtab')

   <form class="form-horizontal" method="POST" action="{{route('newStudent.update',$student->id)}}">
    @csrf
    @method('PUT')
<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">Enlist Student</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3 py-3">
        <p class="DivHeaderText pb-2 mb-2">LOG IN DETAILS</p>
        <?php
        function generateKey(){
            $keyLength = 9;
            $str = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $randStr = substr(str_shuffle($str), 0, $keyLength);
            return $randStr;
        }?>
     
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Username</label>
                    <input type="text" class="form-control required {{ $errors->has('username') ? ' is-invalid' : '' }}" id="idNumber" value="{{generateKey()}}" name="username">
                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label class="input-label">Password</label>
                    <input type="password" class="form-control required {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password1" name="password">
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
            </div>
            <p class="DivHeaderText my-2 py-2">BASIC INFORMATION</p>
            <div class="form-row">
                <div class="form-group col-sm-4">
                    <label class="input-label">First Name</label>
                    <input type="text" class="form-control" name="firstName" value="{{$student->firstName}}">
                </div>
                <div class="form-group col-sm-4">
                    <label class="input-label">Middle Name</label>
                    <input type="text" class="form-control" name="middleName" value="{{$student->middleName}}">
                </div>
                <div class="form-group col-sm-4">
                    <label class="input-label">Last Name</label>
                    <input type="text" class="form-control" name="lastName" value="{{$student->lastName}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-8">
                    <label class="input-label">Date of Birth</label>
                    <div class="form-row mb-n3">
                        <div class="form-group col-sm-4">
                            <select class="form-control" name="month" id="month" required>
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
                            <input class="form-control" name="day" pattern="^\d*(\d{0})?$" type="text" value="{{$student->day}}" placeholder="Day" required>
                        </div>
                        <div class="form-group col-sm-4">
                            <select class="form-control" type="text" name="year" id="year" placeholder="Year" required>
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
                        <input type="radio" name="gender" id="genderMale" value="Male" class="form-check-input" @if($student->gender == 'Male') checked @endif>
                        <label for="genderMale" class="form-check-label">Male</label>
                    </div>
                    <div class="form-check form-check-inline ml-4">
                        <input type="radio" name="gender" id="genderFemale" value="Female" class="form-check-input"  @if($student->gender == 'Female') checked @endif>
                        <label for="genderFemale" class="form-check-label">Female</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Permanent Address</label>
                    <textarea name="permanentAddress" id="" rows="3" class="form-control">{{$student->permanentAddress}}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Present Address</label>
                    <textarea name="presentAddress" id="" rows="3" class="form-control">{{$student->presentAddress}}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Email Address</label>
                    <input type="email" class="form-control" value="{{$student->email}}" name="email">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Contact Number</label>
                    <input type="number" pattern="/^-?\d+\.?\d*$/" class="form-control" onKeyPress="if(this.value.length==11) return false;" value="{{$student->contactNumber}}" name="contactNumber">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Grade Level Completed</label>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <select name="gradeLevelCompleted" id="gradeLevel" class="form-control">
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
                    </div>
                </div>
            </div>
            <p class="DivHeaderText my-2 py-2">GUARDIAN INFORMATION</p>
            <div class="form-row">
                <div class="form-group col-sm-4">
                    <label class="input-label">First Name</label>
                    <input type="text" class="form-control" name="gFirstName" value="{{$student->studentGuardian->gFirstName}}">
                </div>
                <div class="form-group col-sm-4">
                    <label class="input-label">Middle Name</label>
                    <input type="text" class="form-control" name="gMiddleName" value="{{$student->studentGuardian->gMiddleName}}">
                </div>
                <div class="form-group col-sm-4">
                    <label class="input-label">Last Name</label>
                    <input type="text" class="form-control" name="gLastname" value="{{$student->studentGuardian->gLastname}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Relationship</label>
                    <input type="text" class="form-control" name="gRelationship" value="{{$student->studentGuardian->gRelationship}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Complete Address</label>
                    <textarea name="gCompleteAddress" id="" rows="3" class="form-control">{{$student->studentGuardian->gCompleteAddress}}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Contact Number</label>
                    <input type="number" pattern="/^-?\d+\.?\d*$/" class="form-control" onKeyPress="if(this.value.length==11) return false;" value="{{$student->studentGuardian->gContactNumber}}" name="gContactNumber">
                </div>
            </div>
            <p class="DivHeaderText my-2 py-2">SCHOOL REQUIREMENTS</p>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <div class="form-check">
                        <input type="checkbox" name="nso" id="nso" value="Photocopy of Birth Certificate (NSO)" class="form-check-input">
                        <label for="nso" class="form-check-label input-label">Photocopy of Birth Certificate (NSO)</label>
                    </div>
                    <div class="form-check">
                       <input type="checkbox" name="medicalRecord" id="medicalRecord" value="Student's Medical Record" class="form-check-input">
                       <label for="medicalRecord" class="form-check-label input-label">Student's Medical Record</label>
                   </div>
                   <div class="form-check">
                       <input type="checkbox" name="reportCard" id="reportCard" value="Student's Report Card (Form 138)" class="form-check-input">
                       <label for="reportCard" class="form-check-label input-label">Student's Report Card (Form 138)</label>
                   </div>
                   <div class="form-check">
                       <input type="checkbox" name="goodMoral" id="goodMoral" value="Good Moral Certificate" class="form-check-input">
                       <label for="goodMoral" class="form-check-label input-label">Good Moral Certificate</label>
                   </div>
                </div>
            </div>
            <p class="DivHeaderText py-2 my-2">UPLOAD PHOTO</p>
            <div class="row">
                <div class="col-sm-12">
                    <div class="p-3">
                        <div class="d-flex justify-content-center">
                            <img id='photoDisplay' class='mx-auto' src='{{ asset('images/1.jpg') }}' style="width: 150px; height: 150px">
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <input type="file" name="userPhoto" id="user_photo" accept="image/*" style="width: 210px"> 
                        </div>
                        <input type="hidden" id='photoSaving' name="photoPath"  class='form-control'>
                    </div>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="submit" class="save-button">Verify</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('newStudent.index') }}'">Back</button>
                </div>
            </div>
        </div>

    </div>
</div>
</form>
<script>
    $(document).ready(function(){

    $("#month option[value='{{$student->month}}']").attr("selected", "selected");
    $("#year option[value='{{$student->year}}']").attr("selected", "selected");

       $('#password1').val($('#idNumber').val());
       $('#confirm-password').val($('#idNumber').val());

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
    </script>

@endsection
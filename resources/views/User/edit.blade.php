@extends('layouts.master')

@section('content')


<style>
    #teacher_div {
    display: none;
}
</style>
@include('layouts.vtab')

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
                    <input type="text" class="form-control" name="idNumber">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label class="input-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group col-sm-6">
                    <label class="input-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Account Type</label>
                    <select class="form-control" name="accountType" onchange="showDiv(this)">
                        <option value="0">Admin</option>
                        <option value="1">Teacher</option>
                    </select>
                </div>
            </div>
            <p class="DivHeaderText my-2 py-2">BASIC INFORMATION</p>
            <div class="form-row">
                <div class="form-group col-sm-4">
                    <label class="input-label">First Name</label>
                    <input type="text" class="form-control" name="firstName">
                </div>
                <div class="form-group col-sm-4">
                    <label class="input-label">Middle Name</label>
                    <input type="text" class="form-control" name="middleName">
                </div>
                <div class="form-group col-sm-4">
                    <label class="input-label">Last Name</label>
                    <input type="text" class="form-control" name="lastName">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-8">
                    <label class="input-label">Date of Birth</label>
                    <div class="form-row mb-n3">
                        <div class="form-group col-sm-4">
                            <select class="form-control" name="month" required>
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
                            <input class="form-control" name="day" pattern="^\d*(\d{0})?$" type="text" placeholder="Day" required>
                        </div>
                        <div class="form-group col-sm-4">
                            <select class="form-control" type="text" name="year" placeholder="Year" required>
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
                        <input type="radio" name="gender" id="genderMale" class="form-check-input">
                        <label for="genderMale" class="form-check-label">Male</label>
                    </div>
                    <div class="form-check form-check-inline ml-4">
                        <input type="radio" name="gender" id="genderFemale" class="form-check-input">
                        <label for="genderFemale" class="form-check-label">Female</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Permanent Address</label>
                    <textarea name="" id="" rows="3" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Present Address</label>
                    <textarea name="" id="" rows="3" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Email Address</label>
                    <input type="email" class="form-control" name="emailAddress">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Contact Number</label>
                    <input type="number" pattern="/^-?\d+\.?\d*$/" class="form-control" onKeyPress="if(this.value.length==11) return false;" name="contactNumber">
                </div>
            </div>
            <div id="teacher_div">
                <p class="DivHeaderText my-2 py-2">SCHOOL RELATED INFORMATION</p>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label class="input-label">Department</label>
                        <select name="" id="" class="form-control">
                            <option value="Elementary">Elementary</option>
                            <option value="High School">High School</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label class="input-label">Add Subjects</label> 
                                <select name="" id="" class="form-control" style="background: #fbebd8; color: #A90011; border: none; font-weight: 600; font-size: 14px">
                                    <option value="">All Subjects</option>
                                     <!-- if student is elementary -->
                                    <option value="">Grade 1 Subjects</option>
                                    <option value="">Grade 2 Subjects</option>
                                    <option value="">Grade 3 Subjects</option>
                                    <option value="">Grade 4 Subjects</option>
                                    <option value="">Grade 5 Subjects</option>
                                    <option value="">Grade 6 Subjects</option>
                                    <!-- if student is high school -->
                                    <option value="">Grade 7 Subjects</option>
                                    <option value="">Grade 8 Subjects</option>
                                    <option value="">Grade 9 Subjects</option>
                                    <option value="">Grade 10 Subjects</option>
                                </select>
                            </div>
                         </div>
                         <div class="form-row">
                            <div class="form-group col-sm-12">
                                <div class="form-check">
                                    <input type="checkbox" name="" id="selectAllSubjects" class="form-check-input">
                                    <label for="selectAllSubjects" class="form-check-label input-label">Select All</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="" id="subject1" class="form-check-input">
                                    <label for="subject1" class="form-check-label input-label">Subject 1</label>
                                </div>
                            </div>
                         </div>
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
                            <input type="file" name="userPhoto" id="patientPhoto" accept="image/*" style="width: 210px">
                        </div>
                            
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

<script>
  function showDiv(select){
   if(select.value==1){
    document.getElementById('teacher_div').style.display = "block";
   } 
   else {
    document.getElementById('teacher_div').style.display = "none";
   }
} 
</script>

@endsection
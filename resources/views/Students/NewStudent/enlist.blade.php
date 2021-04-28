@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">Enlist Student</p>
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
            <p class="DivHeaderText my-2 py-2">GUARDIAN INFORMATION</p>
            <div class="form-row">
                <div class="form-group col-sm-4">
                    <label class="input-label">First Name</label>
                    <input type="text" class="form-control" name="">
                </div>
                <div class="form-group col-sm-4">
                    <label class="input-label">Middle Name</label>
                    <input type="text" class="form-control" name="">
                </div>
                <div class="form-group col-sm-4">
                    <label class="input-label">Last Name</label>
                    <input type="text" class="form-control" name="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Relationship</label>
                    <input type="text" class="form-control" name="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Complete Address</label>
                    <textarea name="" id="" rows="3" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Contact Number</label>
                    <input type="number" class="form-control" name="contactNumber">
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
                    </div>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="submit" class="save-button">Save</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('newStudent.index') }}'">Back</button>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
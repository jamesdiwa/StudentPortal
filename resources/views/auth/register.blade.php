@extends('layouts.app')

@section('content')


<style>
    #teacher_div, #student_div {
    display: none;
}
</style>
{{-- @include('layouts.vtab') --}}

{{-- <div class="content content-margin pb-2" id="content"> --}}
    
    <div class="container pb-3 w-75" style="margin-top: 60px">
        {{-- <div class="row header-bg" style="margin-top: 70px">
            <div class="col-sm-12">
                <p class="header-title">Student</p>
            </div>
        </div> --}}
        {{-- <div class="DivTemplate mt-3 py-3">
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
        </div> --}}

<form class="form-horizontal" method="POST" action="{{route('registerNewStudent')}}">
    @csrf
        <div class="DivTemplate mt-3 py-3">
            <p class="DivHeaderText mb-2 pb-2">BASIC INFORMATION</p>
            <div class="form-row">
                <div class="form-group col-sm-4">
                    <label class="input-label">First Name</label>
                    <input type="text" class="form-control" name="firstName" required>
                </div>
                <div class="form-group col-sm-4">
                    <label class="input-label">Middle Name</label>
                    <input type="text" class="form-control" name="middleName">
                </div>
                <div class="form-group col-sm-4">
                    <label class="input-label">Last Name</label>
                    <input type="text" class="form-control" name="lastName" required>
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
                            <input type="radio" name="gender" id="genderMale" value="Male" class="form-check-input" checked>
                            <label for="genderMale" class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline ml-4">
                            <input type="radio" name="gender" id="genderFemale" value="Female" class="form-check-input">
                            <label for="genderFemale" class="form-check-label">Female</label>
                        </div>
                    </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Permanent Address</label>
                    <textarea name="permanentAddress" id="" rows="3" class="form-control" required></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Present Address</label>
                    <textarea name="presentAddress" id="" rows="3" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Email Address</label>
                    <input type="email" class="form-control required {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Contact Number</label>
                    <input type="number" pattern="/^-?\d+\.?\d*$/" class="form-control" onKeyPress="if(this.value.length==11) return false;" name="contactNumber" required>
                </div>
            </div>
        </div>

        <div class="DivTemplate mt-3 py-3">
            <p class="DivHeaderText mb-2 pb-2">GUARDIAN INFORMATION</p>
            <div class="form-row">
                <div class="form-group col-sm-4">
                    <label class="input-label">First Name</label>
                    <input type="text" class="form-control" name="gFirstName">
                </div>
                <div class="form-group col-sm-4">
                    <label class="input-label">Middle Name</label>
                    <input type="text" class="form-control" name="gMiddleName">
                </div>
                <div class="form-group col-sm-4">
                    <label class="input-label">Last Name</label>
                    <input type="text" class="form-control" name="gLastname">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Relationship</label>
                    <input type="text" class="form-control" name="gRelationship">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Complete Address</label>
                    <textarea name="gCompleteAddress" id="" rows="3" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Contact Number</label>
                    <input type="number" pattern="/^-?\d+\.?\d*$/" class="form-control" onKeyPress="if(this.value.length==11) return false;" name="gContactNumber">
                </div>
            </div>
            <div class="row mt-3 mb-2 px-2">
                <div class="col-sm-12">
                    <button type="submit" class="save-button" style="width: 150px">Register</button>
                    <button type="button" class="back-button float-right" style="width: 150px" onclick="window.location='{{ url('/') }}'">Back</button>
                </div>
            </div>
        </div>
</form>
        {{-- <div class="DivTemplate mt-3 py-3">
            <p class="DivHeaderText mb-2 pb-2">UPLOAD PHOTO</p>
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
            <div class="row mt-3 mb-2 px-2">
                <div class="col-sm-12">
                    <button type="submit" class="save-button" style="width: 150px">Register</button>
                    <button type="button" class="back-button float-right" style="width: 150px" onclick="window.location='{{ url('/') }}'">Back</button>
                </div>
            </div>
        </div> --}}

    </div>
{{-- </div> --}}

@endsection
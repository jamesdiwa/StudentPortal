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

<form class="form-horizontal" method="POST" action="{{route('user.store')}}">
    @csrf
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
                        <input type="text" class="form-control required {{ $errors->has('username') ? ' is-invalid' : '' }}" name="username">
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
                        <input type="password" class="form-control required {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
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
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label class="input-label">Account Type</label>
                        <select class="form-control" name="accountType" onchange="showDiv(this)">
                            <option value="Admin">Admin</option>
                            <option value="Teacher">Teacher</option>
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
                        <textarea name="permanentAddress" id="" rows="3" class="form-control"></textarea>
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
                        <input type="email" class="form-control" name="email">
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
                                    <select name="" id="" class="form-control" style="background: #fbebd8; color: #A90011; border: none; font-weight: 600; font-size: 14px" onchange="subjectShow(this)">
                                        <option value="All Subjects">All Subjects</option>
                                        <!-- if student is elementary -->
                                        <option value="Grade 1">Grade 1 Subjects</option>
                                        <option value="Grade 2">Grade 2 Subjects</option>
                                        <option value="Grade 3">Grade 3 Subjects</option>
                                        <option value="Grade 4">Grade 4 Subjects</option>
                                        <option value="Grade 5">Grade 5 Subjects</option>
                                        <option value="Grade 6">Grade 6 Subjects</option>
                                        <!-- if student is high school -->
                                        <option value="Grade 7">Grade 7 Subjects</option>
                                        <option value="Grade 8">Grade 8 Subjects</option>
                                        <option value="Grade 9">Grade 9 Subjects</option>
                                        <option value="Grade 10">Grade 10 Subjects</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <!-- Grade 1 -->
                                <div class="form-group col-sm-4" id="grade1-subjects">
                                    <label class="DivHeaderText p-0 m-0">GRADE 1 SUBJECTS</label>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="selectAllSubjects" class="form-check-input">
                                        <label for="selectAllSubjects" class="form-check-label input-label">Select All</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="motherTongue1" class="form-check-input">
                                        <label for="motherTongue1" class="form-check-label input-label">Mother Tongue</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="filipino1" class="form-check-input">
                                        <label for="filipino1" class="form-check-label input-label">Filipino 1</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="english1" class="form-check-input">
                                        <label for="english1" class="form-check-label input-label">English 1</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="math1" class="form-check-input">
                                        <label for="math1" class="form-check-label input-label">Math 1</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="science1" class="form-check-input">
                                        <label for="science1" class="form-check-label input-label">Science 1</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="ap1" class="form-check-input">
                                        <label for="ap1" class="form-check-label input-label">Araling Panlipunan 1</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="mapeh1" class="form-check-input">
                                        <label for="mapeh1" class="form-check-label input-label">Mapeh 1</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="esp1" class="form-check-input">
                                        <label for="esp1" class="form-check-label input-label">Edukasyon sa Pagpapakatao 1</label>
                                    </div>
                                </div> <!-- col-sm-auto -->
                                <!-- Grade 2 -->
                                <div class="form-group col-sm-4" id="grade2-subjects">
                                    <label class="DivHeaderText p-0 m-0">GRADE 2 SUBJECTS</label>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="selectAllSubjects" class="form-check-input">
                                        <label for="selectAllSubjects" class="form-check-label input-label">Select All</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="motherTongue2" class="form-check-input">
                                        <label for="motherTongue2" class="form-check-label input-label">Mother Tongue</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="filipino2" class="form-check-input">
                                        <label for="filipino2" class="form-check-label input-label">Filipino 2</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="english2" class="form-check-input">
                                        <label for="english2" class="form-check-label input-label">English 2</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="math2" class="form-check-input">
                                        <label for="math2" class="form-check-label input-label">Math 2</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="science2" class="form-check-input">
                                        <label for="science2" class="form-check-label input-label">Science 2</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="ap2" class="form-check-input">
                                        <label for="ap2" class="form-check-label input-label">Araling Panlipunan 2</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="mapeh2" class="form-check-input">
                                        <label for="mapeh2" class="form-check-label input-label">Mapeh 2</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="esp2" class="form-check-input">
                                        <label for="esp2" class="form-check-label input-label">Edukasyon sa Pagpapakatao 2</label>
                                    </div>
                                </div> <!-- col-sm-auto -->
                                <!-- Grade 3 -->
                                <div class="form-group col-sm-4" id="grade3-subjects">
                                    <label class="DivHeaderText p-0 m-0">GRADE 3 SUBJECTS</label>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="selectAllSubjects" class="form-check-input">
                                        <label for="selectAllSubjects" class="form-check-label input-label">Select All</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="motherTongue3" class="form-check-input">
                                        <label for="motherTongue3" class="form-check-label input-label">Mother Tongue</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="filipino3" class="form-check-input">
                                        <label for="filipino3" class="form-check-label input-label">Filipino 3</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="english3" class="form-check-input">
                                        <label for="english3" class="form-check-label input-label">English 3</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="math3" class="form-check-input">
                                        <label for="math3" class="form-check-label input-label">Math 3</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="science3" class="form-check-input">
                                        <label for="science3" class="form-check-label input-label">Science 3</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="ap3" class="form-check-input">
                                        <label for="ap3" class="form-check-label input-label">Araling Panlipunan 3</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="mapeh3" class="form-check-input">
                                        <label for="mapeh3" class="form-check-label input-label">Mapeh 3</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="esp3" class="form-check-input">
                                        <label for="esp3" class="form-check-label input-label">Edukasyon sa Pagpapakatao 3</label>
                                    </div>
                                </div> <!-- col-sm-auto -->
                                <!-- Grade 4 -->
                                <div class="form-group col-sm-4" id="grade4-subjects">
                                    <label class="DivHeaderText p-0 m-0">GRADE 4 SUBJECTS</label>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="selectAllSubjects" class="form-check-input">
                                        <label for="selectAllSubjects" class="form-check-label input-label">Select All</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="filipino4" class="form-check-input">
                                        <label for="filipino4" class="form-check-label input-label">Filipino 4</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="english4" class="form-check-input">
                                        <label for="english4" class="form-check-label input-label">English 4</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="math4" class="form-check-input">
                                        <label for="math4" class="form-check-label input-label">Math 4</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="science4" class="form-check-input">
                                        <label for="science4" class="form-check-label input-label">Science 4</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="ap4" class="form-check-input">
                                        <label for="ap4" class="form-check-label input-label">Araling Panlipunan 4</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="mapeh4" class="form-check-input">
                                        <label for="mapeh4" class="form-check-label input-label">Mapeh 4</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="esp4" class="form-check-input">
                                        <label for="esp4" class="form-check-label input-label">Edukasyon sa Pagpapakatao 4</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="epp4" class="form-check-input">
                                        <label for="epp4" class="form-check-label input-label">Edukasyong Pantahanan at Pangkabuhayan 4</label>
                                    </div>
                                </div> <!-- col-sm-auto -->
                                <!-- Grade 5 -->
                                <div class="form-group col-sm-4" id="grade5-subjects">
                                    <label class="DivHeaderText p-0 m-0">GRADE 5 SUBJECTS</label>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="selectAllSubjects" class="form-check-input">
                                        <label for="selectAllSubjects" class="form-check-label input-label">Select All</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="filipino5" class="form-check-input">
                                        <label for="filipino5" class="form-check-label input-label">Filipino 5</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="english5" class="form-check-input">
                                        <label for="english5" class="form-check-label input-label">English 5</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="math5" class="form-check-input">
                                        <label for="math5" class="form-check-label input-label">Math 5</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="science5" class="form-check-input">
                                        <label for="science5" class="form-check-label input-label">Science 5</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="ap5" class="form-check-input">
                                        <label for="ap5" class="form-check-label input-label">Araling Panlipunan 5</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="mapeh5" class="form-check-input">
                                        <label for="mapeh5" class="form-check-label input-label">Mapeh 5</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="esp5" class="form-check-input">
                                        <label for="esp5" class="form-check-label input-label">Edukasyon sa Pagpapakatao 5</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="epp5" class="form-check-input">
                                        <label for="epp5" class="form-check-label input-label">Edukasyong Pantahanan at Pangkabuhayan 5</label>
                                    </div>
                                </div> <!-- col-sm-auto -->
                                <!-- Grade 6 -->
                                <div class="form-group col-sm-4" id="grade6-subjects">
                                    <label class="DivHeaderText p-0 m-0">GRADE 6 SUBJECTS</label>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="selectAllSubjects" class="form-check-input">
                                        <label for="selectAllSubjects" class="form-check-label input-label">Select All</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="filipino6" class="form-check-input">
                                        <label for="filipino6" class="form-check-label input-label">Filipino 6</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="english6" class="form-check-input">
                                        <label for="english6" class="form-check-label input-label">English 6</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="math6" class="form-check-input">
                                        <label for="math6" class="form-check-label input-label">Math 6</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="science6" class="form-check-input">
                                        <label for="science6" class="form-check-label input-label">Science 6</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="ap6" class="form-check-input">
                                        <label for="ap6" class="form-check-label input-label">Araling Panlipunan 6</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="mapeh6" class="form-check-input">
                                        <label for="mapeh6" class="form-check-label input-label">Mapeh 6</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="esp6" class="form-check-input">
                                        <label for="esp6" class="form-check-label input-label">Edukasyon sa Pagpapakatao 6</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="epp6" class="form-check-input">
                                        <label for="epp6" class="form-check-label input-label">Edukasyong Pantahanan at Pangkabuhayan 6</label>
                                    </div>
                                </div> <!-- col-sm-auto -->
                                <!-- Grade 7 -->
                                <div class="form-group col-sm-4" id="grade7-subjects">
                                    <label class="DivHeaderText p-0 m-0">GRADE 7 SUBJECTS</label>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="selectAllSubjects" class="form-check-input">
                                        <label for="selectAllSubjects" class="form-check-label input-label">Select All</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="filipino7" class="form-check-input">
                                        <label for="filipino7" class="form-check-label input-label">Filipino 7</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="english7" class="form-check-input">
                                        <label for="english7" class="form-check-label input-label">English 7</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="math7" class="form-check-input">
                                        <label for="math7" class="form-check-label input-label">Math 7</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="science7" class="form-check-input">
                                        <label for="science7" class="form-check-label input-label">Science 7</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="ap7" class="form-check-input">
                                        <label for="ap7" class="form-check-label input-label">Araling Panlipunan 7</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="mapeh7" class="form-check-input">
                                        <label for="mapeh7" class="form-check-label input-label">Mapeh 7</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="esp7" class="form-check-input">
                                        <label for="esp7" class="form-check-label input-label">Edukasyon sa Pagpapakatao 7</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="tle7" class="form-check-input">
                                        <label for="tle7" class="form-check-label input-label">TLE 7</label>
                                    </div>
                                </div> <!-- col-sm-auto -->
                                <!-- Grade 8 -->
                                <div class="form-group col-sm-4" id="grade8-subjects">
                                    <label class="DivHeaderText p-0 m-0">GRADE 8 SUBJECTS</label>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="selectAllSubjects" class="form-check-input">
                                        <label for="selectAllSubjects" class="form-check-label input-label">Select All</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="filipino8" class="form-check-input">
                                        <label for="filipino8" class="form-check-label input-label">Filipino 8</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="english8" class="form-check-input">
                                        <label for="english8" class="form-check-label input-label">English 8</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="math8" class="form-check-input">
                                        <label for="math8" class="form-check-label input-label">Math 8</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="science8" class="form-check-input">
                                        <label for="science8" class="form-check-label input-label">Science 8</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="ap8" class="form-check-input">
                                        <label for="ap8" class="form-check-label input-label">Araling Panlipunan 8</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="mapeh8" class="form-check-input">
                                        <label for="mapeh8" class="form-check-label input-label">Mapeh 8</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="esp8" class="form-check-input">
                                        <label for="esp8" class="form-check-label input-label">Edukasyon sa Pagpapakatao 8</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="tle8" class="form-check-input">
                                        <label for="tle8" class="form-check-label input-label">TLE 8</label>
                                    </div>
                                </div> <!-- col-sm-auto -->
                                <!-- Grade 9 -->
                                <div class="form-group col-sm-4" id="grade9-subjects">
                                    <label class="DivHeaderText p-0 m-0">GRADE 9 SUBJECTS</label>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="selectAllSubjects" class="form-check-input">
                                        <label for="selectAllSubjects" class="form-check-label input-label">Select All</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="filipino9" class="form-check-input">
                                        <label for="filipino9" class="form-check-label input-label">Filipino 9</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="english9" class="form-check-input">
                                        <label for="english9" class="form-check-label input-label">English 9</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="math9" class="form-check-input">
                                        <label for="math9" class="form-check-label input-label">Math 9</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="science9" class="form-check-input">
                                        <label for="science9" class="form-check-label input-label">Science 9</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="ap9" class="form-check-input">
                                        <label for="ap9" class="form-check-label input-label">Araling Panlipunan 9</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="mapeh9" class="form-check-input">
                                        <label for="mapeh9" class="form-check-label input-label">Mapeh 9</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="esp9" class="form-check-input">
                                        <label for="esp9" class="form-check-label input-label">Edukasyon sa Pagpapakatao 9</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="tle9" class="form-check-input">
                                        <label for="tle9" class="form-check-label input-label">TLE 9</label>
                                        {{-- <div class="form-check">
                                            <input type="checkbox" name="tle9Major" id="agri9" class="form-check-input">
                                            <label for="agri9" class="form-check-label input-label">Agri-Fishery Arts</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" name="tle9Major" id="homeEcon9" class="form-check-input">
                                            <label for="homeEcon9" class="form-check-label input-label">Home Economics</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" name="tle9Major" id="ict9" class="form-check-input">
                                            <label for="ict9" class="form-check-label input-label">Information and Communications Technology</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" name="tle9Major" id="industrial9" class="form-check-input">
                                            <label for="industrial9" class="form-check-label input-label">Industrial Arts</label>
                                        </div> --}}
                                    </div>
                                </div> <!-- col-sm-auto -->
                                <!-- Grade 10 -->
                                <div class="form-group col-sm-4" id="grade10-subjects">
                                    <label class="DivHeaderText p-0 m-0">GRADE 10 SUBJECTS</label>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="selectAllSubjects" class="form-check-input">
                                        <label for="selectAllSubjects" class="form-check-label input-label">Select All</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="filipino10" class="form-check-input">
                                        <label for="filipino10" class="form-check-label input-label">Filipino 10</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="english10" class="form-check-input">
                                        <label for="english10" class="form-check-label input-label">English 10</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="math10" class="form-check-input">
                                        <label for="math10" class="form-check-label input-label">Math 10</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="science10" class="form-check-input">
                                        <label for="science10" class="form-check-label input-label">Science 10</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="ap10" class="form-check-input">
                                        <label for="ap10" class="form-check-label input-label">Araling Panlipunan 10</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="mapeh10" class="form-check-input">
                                        <label for="mapeh10" class="form-check-label input-label">Mapeh 10</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="esp10" class="form-check-input">
                                        <label for="esp10" class="form-check-label input-label">Edukasyon sa Pagpapakatao 10</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="" id="tle10" class="form-check-input">
                                        <label for="tle10" class="form-check-label input-label">TLE 10</label>
                                        {{-- <div class="form-check">
                                            <input type="checkbox" name="tle10Major" id="agri10" class="form-check-input">
                                            <label for="agri10" class="form-check-label input-label">Agri-Fishery Arts</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" name="tle10Major" id="homeEcon10" class="form-check-input">
                                            <label for="homeEcon10" class="form-check-label input-label">Home Economics</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" name="tle10Major" id="ict10" class="form-check-input">
                                            <label for="ict10" class="form-check-label input-label">Information and Communications Technology</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" name="tle10Major" id="industrial10" class="form-check-input">
                                            <label for="industrial10" class="form-check-label input-label">Industrial Arts</label>
                                        </div> --}}
                                    </div>
                                </div> <!-- col-sm-auto -->
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
    if(select.value=="Teacher"){
        $('#teacher_div').show();
    } 
    else {
        $('#teacher_div').hide();
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
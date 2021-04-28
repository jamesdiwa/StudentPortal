@extends('layouts.master')

@section('content')


<style>
    #full_div, #installment_div {
    display: none;
}
</style>
@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">Enrollment</p>
        </div>
    </div>
    <div class="container">
       <!-- Basic Info -->
        <div class="DivTemplate mt-3 py-3">
            <p class="DivHeaderText mb-2 pb-2">BASIC INFORMATION</p>
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
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label class="input-label">School Year</label>
                    <select name="" id="" class="form-control">
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label class="input-label">LRN</label>
                    <input type="number" class="form-control" name="schoolAttended">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">School Last Attended</label>
                    <input type="text" class="form-control" name="schoolAttended">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label class="input-label">Grade Level Completed</label>
                    <select name="" id="" class="form-control">
                        <option value="" disabled selected>Select Grade Level</option>
                        <option value="">Kindergarten</option>
                        <option value="">Grade 1</option>
                        <option value="">Grade 2</option>
                        <option value="">Grade 3</option>
                        <option value="">Grade 4</option>
                        <option value="">Grade 5</option>
                        <option value="">Grade 6</option>
                        <option value="">Grade 7</option>
                        <option value="">Grade 8</option>
                        <option value="">Grade 9</option>
                        <option value="">Grade 10</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label class="input-label">General Grade Average</label>
                    <input type="number" name="" id="" class="form-control">
                </div>
            </div>
            <!-- Guardian Details -->
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
            <!-- Payment Details -->
            <p class="DivHeaderText my-2 py-2">PAYMENT DETAILS</p>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Type of Payment</label>
                    <select name="" id="" class="form-control" onclick="showDiv(this)">
                        <option value="0" selected disabled>Select Mode of Payment</option>
                        <option value="1">Full Payment</option>
                        <option value="2">Installment</option>
                    </select>
                </div>
            </div>
            <div class="form-row" id="full_div">
                <div class="form-group col-sm-12">
                    <label class="input-label">Amount</label>
                    <input type="number" name="" id="" class="form-control">
                </div>
            </div>
            <div id="installment_div">
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label class="input-label">Total Payment Due</label>
                        <input type="number" name="" id="" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="input-label">Down Payment</label>
                        <input type="number" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label class="input-label">Monthly Payment</label>
                        <table width="100%">
                            <tr>
                                <td>
                                    <input type="number" id="" name="" class="form-control">
                                </td>
                                <td width="300px">
                                    <label class="input-label mx-2">every 15th day of the month</label>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
             <!-- Subjects -->
             {{-- <p class="DivHeaderText my-2 py-2">SUBJECTS</p>
             <div class="row">
                <div class="form-group col-sm-4">
                    <label class="p-0 m-0 sub-title">Filter by</label>
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
             </div> --}}
             <!-- Requirements -->
             <p class="DivHeaderText my-2 py-2">SCHOOL REQUIREMENTS</p>
             <div class="form-row">
                 <div class="form-group col-sm-12">
                     <div class="form-check">
                         <input type="checkbox" name="" id="nso" class="form-check-input">
                         <label for="nso" class="form-check-label input-label">Photocopy of Birth Certificate (NSO)</label>
                     </div>
                     <div class="form-check">
                        <input type="checkbox" name="" id="medicalRecord" class="form-check-input">
                        <label for="medicalRecord" class="form-check-label input-label">Student's Medical Record</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="" id="reportCard" class="form-check-input">
                        <label for="reportCard" class="form-check-label input-label">Student's Report Card (Form 138)</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="" id="goodMoral" class="form-check-input">
                        <label for="goodMoral" class="form-check-label input-label">Good Moral Certificate</label>
                    </div>
                 </div>
             </div>
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="submit" class="save-button">Enroll</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('studentList.index') }}'">Back</button>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function showDiv(select){
     if(select.value==1){
      document.getElementById('full_div').style.display = "block";
      document.getElementById('installment_div').style.display = "none";
     }
     else if(select.value==2){
      document.getElementById('installment_div').style.display = "block";
      document.getElementById('full_div').style.display = "none";
     }
     else{
      document.getElementById('full_div').style.display = "none";
      document.getElementById('installment_div').style.display = "none";
     }
  } 
  </script>

@endsection
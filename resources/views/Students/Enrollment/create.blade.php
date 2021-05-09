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
<form class="form-horizontal" method="POST" action="{{route('enrollment.store')}}">
    @csrf
    <input type="hidden" value="{{$student->id}}" name="userId">
    <div class="container">
       <!-- Basic Info -->
        <div class="DivTemplate mt-3 py-3">
            <p class="DivHeaderText mb-2 pb-2">BASIC INFORMATION</p>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Student Number</label>
                    <input type="text" class="form-control"  value="{{$student->username}}" readonly>
                </div>
               
            </div>
            <div class="form-row">
                <div class="form-group col-sm-4">
                    <label class="input-label">First Name</label>
                    <input type="text" class="form-control"   value="{{$student->firstName}}" readonly>
                </div>
                <div class="form-group col-sm-4">
                    <label class="input-label">Middle Name</label>
                    <input type="text" class="form-control" value="{{$student->middleName}}" readonly>
                </div>
                <div class="form-group col-sm-4">
                    <label class="input-label">Last Name</label>
                    <input type="text" class="form-control"  value="{{$student->lastName}}" readonly>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label class="input-label">Grade Level</label>
                   <input type="text" class="form-control" value="{{$gradeLevel}}" name="gradeLevel" readonly>
                </div>
                <div class="form-group col-sm-6">
                    <label class="input-label">Section</label>
                   <input type="hidden" name="sy" value="" id="sy">
                    <select name="section" id="sectionSelect" class="form-control">
                        <option value="">Select</option>
                        @foreach ($section as $section)
                          <option value="{{$section->id}}" data-sy="{{$section->schoolYearFrom}}-{{$section->schoolYearTo}}" data-classSchedId="{{$section->id}}">{{$section->section}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
          
            <!-- Payment Details -->
            <p class="DivHeaderText my-2 py-2">PAYMENT DETAILS</p>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Type of Payment</label>
                    <select name="typeOfPayment" id="" class="form-control" onclick="showDiv(this)">
                        <option value="" selected disabled>Select Mode of Payment</option>
                        <option value="Full Payment">Full Payment</option>
                        <option value="Installment">Installment</option>
                    </select>
                </div>
            </div>
            <div  id="full_div">
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label class="input-label">Tuition Fee</label>
                        <input type="number" name="tuitionFee1" id="" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="input-label">Amount Received</label>
                        <input type="number" name="payment1" id="" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label class="input-label">Date of Payment</label>
                        <input type="date" name="date1" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="input-label">Notes</label>
                        <input type="text" name="notes1" id="" class="form-control">
                    </div>
                </div>
            </div>
            <div id="installment_div">
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label class="input-label">Tuition Fee</label>
                        <input type="number" name="tuitionFee2" id="tuitionFee" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="input-label">Down Payment</label>
                        <input type="number" name="payment2" id="downPayment" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label class="input-label">Monthly Payment</label>
                        <table width="100%">
                            <tr>
                                <td>
                                    <input type="number" id="monthlyPayment" name="monthlyPayment2" class="form-control" readonly>
                                </td>
                                <td width="300px">
                                    <label class="input-label mx-2">every 15th day of the month</label>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label class="input-label">Date of Payment</label>
                        <input type="date" name="date2" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="input-label">Notes</label>
                        <input type="text" name="notes2" id="" class="form-control">
                    </div>
                </div>
                
            </div>
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="submit" class="save-button">Enroll</button>

                    @if($gradeLevel == 'Grade 1')
                         <button type="button" class="back-button float-right" onclick="window.location='{{ route('Grade1Index') }}'">Back</button>
                    @elseif($gradeLevel == 'Grade 2')
                         <button type="button" class="back-button float-right" onclick="window.location='{{ route('Grade2Index') }}'">Back</button>
                    @elseif($gradeLevel == 'Grade 3')
                         <button type="button" class="back-button float-right" onclick="window.location='{{ route('Grade3Index') }}'">Back</button>
                    @elseif($gradeLevel == 'Grade 4')
                         <button type="button" class="back-button float-right" onclick="window.location='{{ route('Grade4Index') }}'">Back</button>
                    @elseif($gradeLevel == 'Grade 5')
                         <button type="button" class="back-button float-right" onclick="window.location='{{ route('Grade5Index') }}'">Back</button>
                    @elseif($gradeLevel == 'Grade 6')
                         <button type="button" class="back-button float-right" onclick="window.location='{{ route('Grade6Index') }}'">Back</button>
                    @elseif($gradeLevel == 'Grade 7')
                         <button type="button" class="back-button float-right" onclick="window.location='{{ route('Grade7Index') }}'">Back</button>
                    @elseif($gradeLevel == 'Grade 8')
                         <button type="button" class="back-button float-right" onclick="window.location='{{ route('Grade8Index') }}'">Back</button>
                    @elseif($gradeLevel == 'Grade 9')
                         <button type="button" class="back-button float-right" onclick="window.location='{{ route('Grade9Index') }}'">Back</button>
                    @elseif($gradeLevel == 'Grade 10')
                         <button type="button" class="back-button float-right" onclick="window.location='{{ route('Grade10Index') }}'">Back</button>
                    @endif
                    
                </div>
            </div>
        </div>
</form>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#month option[value='{{$student->month}}']").attr("selected", "selected");
        $("#year option[value='{{$student->year}}']").attr("selected", "selected");

        $('#sectionSelect').change(function(){
            $('#sy').val($(this).find("option:selected").attr('data-sy'));
        });


        $('#downPayment').change(function(){
           var tuitionFee = parseFloat($('#tuitionFee').val());
           var downpayment = parseFloat($(this).val());

           if(tuitionFee == ''){
                tuitionFee = 0;
           }
           if(downpayment == ''){
               downpayment = 0;
           }

           var total = 0,total1 = 0;

           total1 = tuitionFee - downpayment;

           total = total1 / 24;

            $('#monthlyPayment').val(total);
        });

        $('#tuitionFee').change(function(){
           var tuitionFee = parseFloat($(this).val());
           var downpayment = parseFloat($('#downPayment').val());

           if(tuitionFee == ''){
                tuitionFee = 0;
           }
           if(downpayment == ''){
               downpayment = 0;
           }
           
           var total = 0,total1 = 0;

           total1 = tuitionFee - downpayment;

           total = total1 / 24;

            $('#monthlyPayment').val(total);
        });





    });
   

    function showDiv(select){
     if(select.value== "Full Payment"){
      document.getElementById('full_div').style.display = "block";
      document.getElementById('installment_div').style.display = "none";
      
     }
     else if(select.value=="Installment"){
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
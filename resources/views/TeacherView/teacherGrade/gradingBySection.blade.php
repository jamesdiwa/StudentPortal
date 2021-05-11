@extends('layouts.master')

@section('content')

@include('layouts.vtabTeacher')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">Grading Administration</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3 py-3"> 
            <div class="row my-3">
                <div class="col-sm-6">
                    <table>
                        <tbody class="tbody-data">
                            <tr>
                                <td width="110px" class="font-weight-normal">Grade Level</td>
                                <td style="color: #1e1e1e">{{$classSchedules->gradeLevel}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-normal">Section</td>
                                <td style="color: #1e1e1e">{{$classSchedules->section}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6">
                    <table>
                        <tbody class="tbody-data">
                            <tr>
                                <td width="110px" class="font-weight-normal">School Year</td>
                                <td style="color: #1e1e1e">{{$classSchedules->schoolYearFrom}}-{{$classSchedules->schoolYearTo}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-normal">Subject</td>
                                <td style="color: #1e1e1e">{{$subject}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    <form class="form-horizontal" method="POST" action="{{route('classStudentsStore')}}">
        @csrf
            <table class="table table-borderless">
                <thead class="thead-bg text-center">
                    <th width="300px">Student Name</th>
                    <th width="100px">1st Quarter</th>
                    <th width="100px">2nd Quarter</th>
                    <th width="100px">3rd Quarter</th>
                    <th width="100px">4th Quarter</th>
                    <th width="100px">Average</th>
                    <th width="100px">Remarks</th>
                </thead>
             
                <tbody class="tbody-data">

                    @php
                        $count = 0;   
                    @endphp
                    @foreach ($studentGrades as $studentGrades)
                    @php
                        $count++;
                    @endphp
                        <tr class="text-center">
                            <input type="hidden" name="grades[{{$count}}][userId]" value="{{$studentGrades->userId}}">
                            <input type="hidden" name="grades[{{$count}}][enrolledId]" value="{{$studentGrades->enrolledId}}">
                            <input type="hidden" name="grades[{{$count}}][classSchedId]" value="{{$studentGrades->classSchedId}}">
                            <input type="hidden" name="grades[{{$count}}][gradeLevel]" value="{{$studentGrades->gradeLevel}}">
                            <input type="hidden" name="grades[{{$count}}][subject]" value="{{$studentGrades->subject}}">
                            <td class="text-left align-middle">{{$studentGrades->studentInfo->firstName}} {{$studentGrades->studentInfo->middleName}} {{$studentGrades->studentInfo->lastName}}</td>
                            <td><input type="number" class="form-control firstQuarter" name="grades[{{$count}}][firstQuarter]" onchange="firstQuarter(this)" value="{{$studentGrades->firstQuarter}}" min="0" max="100"></td>
                            <td><input type="number" class="form-control secondQuarter" name="grades[{{$count}}][secondQuarter]" onchange="secondQuarter(this)" value="{{$studentGrades->secondQuarter}}" min="0" max="100"></td>
                            <td><input type="number" class="form-control thirdQuarter" name="grades[{{$count}}][thirdQuarter]" onchange="thirdQuarter(this)" value="{{$studentGrades->thirdQuarter}}" min="0" max="100"></td>
                            <td><input type="number" class="form-control fourthQuarter" name="grades[{{$count}}][fourthQuarter]" onchange="getAverage(this)" value="{{$studentGrades->fourthQuarter}}"min="0" max="100"></td>
                            <td class="align-middle average"></td>
                            <td class="align-middle"><span class="remarks" style="color: #8cbd01"></span></td>
                            {{-- <td class="align-middle"><span style="color: #8cbd01">Passed</span></td> --}}
                        </tr>
                    @endforeach

                </tbody>
             </table>
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="submit" class="save-button">Save</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ url('gradingIndex') }}'">Back</button>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>




<script>

    $(document).ready(function(){

        $('.firstQuarter').each(function(){
            if($(this).val() != ""){
               $(this).closest('tr').find('.secondQuarter').attr('readonly', false);
            }else{
                $(this).closest('tr').find('.secondQuarter').attr('readonly', true);
            }


        var second = parseFloat($(this).closest('tr').find('.secondQuarter').val());  
        var third =  parseFloat($(this).closest('tr').find('.thirdQuarter').val());  
        var fourth =  parseFloat($(this).closest('tr').find('.fourthQuarter').val());  
            var first =  parseFloat($(this).closest('tr').find('.firstQuarter').val()); 

            var total = (first + second + third + fourth) / 4;

            $(this).closest('tr').find('.average').html(total);

      
            if(total >= 74.5){
                $(this).closest('tr').find('.remarks').html('<span style="color: #8cbd01">Passed</span>');
            }else if(total <= 74.4){
                $(this).closest('tr').find('.remarks').html('<span style="color: red">Failed</span>');
            }else{
            }



        });

        $('.secondQuarter').each(function(){
            if($(this).val() != ""){
                $(this).closest('tr').find('.thirdQuarter').attr('readonly', false);
            }else{
                $(this).closest('tr').find('.thirdQuarter').attr('readonly', true);
            }
        });

        $('.thirdQuarter').each(function(){
            if($(this).val() != ""){
                $(this).closest('tr').find('.fourthQuarter').attr('readonly', false);
            }else{
                $(this).closest('tr').find('.fourthQuarter').attr('readonly', true);
            }
        });






    });



    function firstQuarter(thisInput){
        if($(thisInput).val() != ""){
            $(thisInput).closest('tr').find('.secondQuarter').attr('readonly', false);
        }else{
            $(thisInput).closest('tr').find('.secondQuarter').val('');  
            $(thisInput).closest('tr').find('.thirdQuarter').val('');  
            $(thisInput).closest('tr').find('.fourthQuarter').val('');  
            $(thisInput).closest('tr').find('.secondQuarter').attr('readonly', true);
            $(thisInput).closest('tr').find('.thirdQuarter').attr('readonly', true);
            $(thisInput).closest('tr').find('.fourthQuarter').attr('readonly', true);
            $(thisInput).closest('tr').find('.remarks').html('');
        }
        getAverage(thisInput);
    }

    function secondQuarter(thisInput){
        if($(thisInput).val() != ""){
            $(thisInput).closest('tr').find('.thirdQuarter').attr('readonly', false);
        }else{
            $(thisInput).closest('tr').find('.thirdQuarter').val('');  
            $(thisInput).closest('tr').find('.fourthQuarter').val('');  
            $(thisInput).closest('tr').find('.thirdQuarter').attr('readonly', true);
            $(thisInput).closest('tr').find('.fourthQuarter').attr('readonly', true);
            $(thisInput).closest('tr').find('.remarks').html('');
        }
        getAverage(thisInput);
    }

    function thirdQuarter(thisInput){
        if($(thisInput).val() != ""){
            $(thisInput).closest('tr').find('.fourthQuarter').attr('readonly', false);
        }else{
            $(thisInput).closest('tr').find('.fourthQuarter').val('');  
            $(thisInput).closest('tr').find('.fourthQuarter').attr('readonly', true);
            $(thisInput).closest('tr').find('.remarks').html('');
        }

        getAverage(thisInput);
    }


    function getAverage(thisInput){
        var second = parseFloat($(thisInput).closest('tr').find('.secondQuarter').val());  
        var third =  parseFloat($(thisInput).closest('tr').find('.thirdQuarter').val());  
        var fourth =  parseFloat($(thisInput).closest('tr').find('.fourthQuarter').val());  
            var first =  parseFloat($(thisInput).closest('tr').find('.firstQuarter').val()); 

            var total = (first + second + third + fourth) / 4;

            $(thisInput).closest('tr').find('.average').html(total);

      
            if(total >= 74.5){
                $(thisInput).closest('tr').find('.remarks').html('<span style="color: #8cbd01">Passed</span>');
            }else if(total <= 74.4){
                $(thisInput).closest('tr').find('.remarks').html('<span style="color: red">Failed</span>');
            }else{
            }
            
    }

     //Min and Max
     $(function () {
       $( 'input[type="number"]' ).change(function() {
          var max = parseInt($(this).attr('max'));
          var min = parseInt($(this).attr('min'));
          if ($(this).val() > max)
          {
              $(this).val(max);
          }
          else if ($(this).val() < min)
          {
              $(this).val(min);
          }       
        }); 
    });

</script>

@endsection
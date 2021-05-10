@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">Grading Administration</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3 py-3"> 
            <div class="p-3">
                <p class="sub-title p-0 m-0" style="font-size: 20px">{{$enrolled->studentInfo->firstName}} {{$enrolled->studentInfo->middleName}} {{$enrolled->studentInfo->lastName}}</p>
                <p class="sub-title p-0 m-0 font-weight-normal">{{$enrolled->studentInfo->username}} ({{$enrolled->enrolled->gradeLevel}} - {{$enrolled->enrolled->section}})</p>
            </div>
    <form class="form-horizontal" method="POST" action="{{route('studentGradeStore')}}">
        @csrf
        <input type="hidden" name="enrolledId" value="{{$enrolled->id}}">
        <input type="hidden" name="userId" value="{{$enrolled->studentInfo->id}}">
            <table class="table table-borderless">
                <thead class="thead-bg text-center">
                    <th width="150px">Subject</th>
                    <th width="100px">First Quarter</th>
                    <th width="100px">Second Quarter</th>
                    <th width="100px">Third Quarter</th>
                    <th width="100px">Fourth Quarter</th>
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
                            <input type="hidden" name="grades[{{$count}}][userId]" value="{{$enrolled->studentInfo->id}}">
                            <input type="hidden" name="grades[{{$count}}][enrolledId]" value="{{$enrolled->id}}">
                            <input type="hidden" name="grades[{{$count}}][classSchedId]" value="{{$enrolled->classSchedId}}">
                            <input type="hidden" name="grades[{{$count}}][gradeLevel]" value="{{$enrolled->enrolled->gradeLevel}}">
                            <input type="hidden" name="grades[{{$count}}][subject]" value="{{$studentGrades->subject}}">
                            <td class="text-left align-middle">{{$studentGrades->subject}}</td>
                            <td><input type="number" class="form-control firstQuarter" name="grades[{{$count}}][firstQuarter]" onchange="firstQuarter(this)" value="{{$studentGrades->firstQuarter}}"></td>
                            <td><input type="number" class="form-control secondQuarter" name="grades[{{$count}}][secondQuarter]" onchange="secondQuarter(this)" value="{{$studentGrades->secondQuarter}}"></td>
                            <td><input type="number" class="form-control thirdQuarter" name="grades[{{$count}}][thirdQuarter]" onchange="thirdQuarter(this)" value="{{$studentGrades->thirdQuarter}}"></td>
                            <td><input type="number" class="form-control fourthQuarter" name="grades[{{$count}}][fourthQuarter]" onchange="getAverage(this)" value="{{$studentGrades->fourthQuarter}}"></td>
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
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('grading.index') }}'">Back</button>
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
                $(this).closest('tr').find('.remarks').html('Passed');
            }else if(total <= 74.4){
                $(this).closest('tr').find('.remarks').html('Failed');
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
        }
        getAverage(thisInput);
    }

    function thirdQuarter(thisInput){
        if($(thisInput).val() != ""){
            $(thisInput).closest('tr').find('.fourthQuarter').attr('readonly', false);
        }else{
            $(thisInput).closest('tr').find('.fourthQuarter').val('');  
            $(thisInput).closest('tr').find('.fourthQuarter').attr('readonly', true);
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
                $(thisInput).closest('tr').find('.remarks').html('Passed');
            }else if(total <= 74.4){
                $(thisInput).closest('tr').find('.remarks').html('Failed');
            }else{
            }
            
    }

</script>

@endsection
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
            <div class="row py-3">
                <div class="col-sm-auto d-flex justify-content-center align-self-center">
                    @if ($enrolled->studentInfo->photoPath != null)
                        <img class="rounded-circle" src="{{ asset('images/UserPhoto/'.$enrolled->studentInfo->photoPath) }}"  style="width: 60px; height: 60px; border: 1px solid #0fceca">
                    @else
                        <img class="rounded-circle" src="{{ asset('images/1.jpg') }}"  style="width: 60px; height: 60px; border: 1px solid #0fceca">
                    @endif
                </div>
                <div class="col-sm d-block align-self-center px-0">
                    <p class="sub-title p-0 m-0" style="font-size: 20px">{{$enrolled->studentInfo->firstName}} {{$enrolled->studentInfo->middleName}} {{$enrolled->studentInfo->lastName}}</p>
                    <p class="sub-title p-0 m-0 font-weight-normal">{{$enrolled->studentInfo->username}} ({{$enrolled->enrolled->gradeLevel}} - {{$enrolled->enrolled->section}})</p>
                </div>
            </div>
            {{-- <div class="p-3">
                
            </div> --}}
            <table class="table table-borderless">
                <thead class="thead-bg text-center">
                    <th width="100px">Subject</th>
                    <th width="100px">First Quarter</th>
                    <th width="100px">Second Quarter</th>
                    <th width="100px">Third Quarter</th>
                    <th width="100px">Fourth Quarter</th>
                    <th width="100px">Average</th>
                    <th width="100px">Remarks</th>
                </thead>
                <tbody class="tbody-data">
                    @foreach ($studentGrades as $studentGrades)
                        <tr class="text-center">
                            <td class="text-left">{{$studentGrades->subject}}</td>
                            <td class="firstQuarter">{{$studentGrades->firstQuarter}}</td>
                            <td class="secondQuarter">{{$studentGrades->secondQuarter}}</td>
                            <td class="thirdQuarter">{{$studentGrades->thirdQuarter}}</td>
                            <td class="fourthQuarter"> {{$studentGrades->fourthQuarter}}</td>
                            <td class="average"></td>
                            <td ><span class="remarks" style="color: #8cbd01"></span></td>
                            {{-- <td><span style="color: #8cbd01">Passed</span></td> --}}
                        </tr>
                    @endforeach
                </tbody>
             </table>
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="button" class="edit-button" onclick="window.location='{{ route('grading.edit',$enrolled->id) }}'">Update</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('grading.index') }}'">Back</button>
                </div>
            </div>
        </div>

    </div>
</div>

<script>


    $(document).ready(function(){


        $('.firstQuarter').each(function(){
            var second = parseFloat($(this).closest('tr').find('.secondQuarter').text());  
            var third =  parseFloat($(this).closest('tr').find('.thirdQuarter').text());  
            var fourth =  parseFloat($(this).closest('tr').find('.fourthQuarter').text());  
                var first =  parseFloat($(this).closest('tr').find('.firstQuarter').text()); 

                var total = (first + second + third + fourth) / 4;

                $(this).closest('tr').find('.average').html(total);

        
                if(total >= 74.5){
                    $(this).closest('tr').find('.remarks').html('Passed');
                }else if(total <= 74.4){
                    $(this).closest('tr').find('.remarks').html('Failed');
                }else{
                }
        });

    });

    var msg = "{{Session::get('success')}}";
    var exist = "{{Session::has('success')}}";
    if(exist){
        Swal.fire({
            icon: 'success',
            title: msg,
            showConfirmButton: false,
            timer: 2000,
        });
    }
    
    </script>
@endsection
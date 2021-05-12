@extends('layouts.master')

@section('content')

@include('layouts.vtabStudent')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title d-inline">My Grade</p>
            <button class="float-right create-button">Print</button>
        </div>
    </div>
    <div class="container">

        @foreach ($enrolled as $enrolled)
        <form class="form-horizontal" method="POST" action="{{route('studentGradeShow')}}">
            @csrf
                <input type="hidden" value="{{$enrolled->id}}" name="enrolledId">

                <button class="mt-3 py-3"  type="submit" style="width:100%;"> 
                    <div class="row my-3">
                        <div class="col-sm-6">
                            <table>
                                <tbody class="tbody-data">
                                    <tr>
                                        <td width="110px" class="font-weight-normal">School Year</td>
                                        <td style="color: #1e1e1e">{{$enrolled->enrolled->schoolYearFrom}}-{{$enrolled->enrolled->schoolYearTo}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-normal">Grade Level</td>
                                        <td style="color: #1e1e1e">{{$enrolled->enrolled->gradeLevel}}</td>
                                    </tr>
                                 
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table>
                                <tbody class="tbody-data">
                                    <tr>
                                        <td width="110px" class="font-weight-normal">Adviser</td>
                                        <td style="color: #1e1e1e">@if($enrolled->enrolled->adviserGender == 'Male') Mr. @else Ms. @endif{{$enrolled->enrolled->classAdviser}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-normal">Section</td>
                                        <td style="color: #1e1e1e">{{$enrolled->enrolled->section}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </button>
            </form>

        @endforeach
    </div>
</div>


<script>
    $(document).ready(function(){
        
    });

    function submitFunction(){
        alert('asdasd');
    }

</script>




@endsection
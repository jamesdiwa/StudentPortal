@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<form class="form-horizontal" method="POST" action="{{route('classSchedule.update',$classSched->id)}}">
@csrf
@method('PUT')
<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">Create Class</p>
        </div>
    </div>
    <div class="container">       
        <div class="DivTemplate mt-3 pt-3">
            <div class="form-row mt-2">
                <div class="form-group col-sm-6">
                    <label class="input-label">Grade Level</label>
                    <select name="gradeLevel" id="gradeLevel" class="form-control" required>
                        <option value="">Select</option>
                        <option value="Grade 1" data-icon="G-1">Grade 1</option>
                        <option value="Grade 2" data-icon="G-2">Grade 2</option>
                        <option value="Grade 3" data-icon="G-3">Grade 3</option>
                        <option value="Grade 4" data-icon="G-4">Grade 4</option>
                        <option value="Grade 5" data-icon="G-5">Grade 5</option>
                        <option value="Grade 6" data-icon="G-6">Grade 6</option>
                        <option value="Grade 7" data-icon="G-7">Grade 7</option>
                        <option value="Grade 8" data-icon="G-8">Grade 8</option>
                        <option value="Grade 9" data-icon="G-9">Grade 9</option>
                        <option value="Grade 10" data-icon="G-10">Grade 10</option>
                    </select>
                    <input type="hidden" value="{{$classSched->gradeLevelIcon}}" name="gradeLevelIcon" id="gradeLevelIcon">
                </div>
                <div class="form-group col-sm-6">
                    <label class="input-label">Section</label>
                    <input type="text" name="section" class="form-control" value="{{$classSched->section}}" required>
                </div>
            </div>

            <div class="form-row mt-2">
                <div class="form-group col-sm-6">
                    <label class="input-label">School Year</label>
                    <input type="text" class="form-control" name="schoolYearFrom" value="{{$classSched->schoolYearFrom}}">
                </div>
                <div class="form-group col-sm-6">
                    <label class="input-label">To</label>
                    <input type="text" class="form-control" name="schoolYearTo" value="{{$classSched->schoolYearTo}}">
                </div>
            </div>
                
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Class Adviser</label>
                    <select name="classAdviser" id="classAdviser" class="form-control">
                        <option value="">Select</option>
                        @foreach($teachers as $teacher)
                        <option value="{{$teacher->firstName}} {{$teacher->middleName}} {{$teacher->lastName}}" data-gender="{{$teacher->gender}}" class="{{str_replace(' ', '', $teacher->gradeLevel)}} adviseHide">{{$teacher->firstName}} {{$teacher->middleName}} {{$teacher->lastName}}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="adviserGender" id="adviserGender" value="{{$classSched->adviserGender}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Additional Notes</label>
                    <textarea name="notes" id="" rows="3" class="form-control">{{$classSched->notes}}</textarea>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="submit" class="save-button">Save</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('classSchedule.show',$classSched->id) }}'">Back</button>
                </div>
            </div>
        </div>

    </div>
</div>
</form>




<script>
    $(document).ready(function(){
        $('.adviseHide').hide();
       

        $('#classAdviser').change(function(){
            $('#adviserGender').val($('#classAdviser option:selected').attr('data-gender'));
        });

        $("#gradeLevel option[value='{{$classSched->gradeLevel}}']").attr("selected", "selected");
        $("#classAdviser option[value='{{$classSched->classAdviser}}']").attr("selected", "selected");

        gradeLevelSelect();
        gradeLevel2();
    });


//Onchange of Selection of Grade
function gradeLevelSelect(){
    $('#gradeLevel').change(function(){
        if($('#gradeLevel').val() == 'Grade 1'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));
            $("#classAdviser").prop("selectedIndex", 0).change();

            $('.adviseHide').hide();
            $('.Grade1').show();

        }else if($('#gradeLevel').val() == 'Grade 2'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));
            $("#classAdviser").prop("selectedIndex", 0).change();

            $('.adviseHide').hide();
            $('.Grade2').show();

        }else if($('#gradeLevel').val() == 'Grade 3'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));
            $("#classAdviser").prop("selectedIndex", 0).change();

            $('.adviseHide').hide();
            $('.Grade3').show();

        }else if($('#gradeLevel').val() == 'Grade 4'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));
            $("#classAdviser").prop("selectedIndex", 0).change();

            $('.adviseHide').hide();
            $('.Grade4').show();

        }else if($('#gradeLevel').val() == 'Grade 5'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));
            $("#classAdviser").prop("selectedIndex", 0).change();

            $('.adviseHide').hide();
            $('.Grade5').show();

        }else if($('#gradeLevel').val() == 'Grade 6'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));
            $("#classAdviser").prop("selectedIndex", 0).change();

            $('.adviseHide').hide();
            $('.Grade6').show();

        }else if($('#gradeLevel').val() == 'Grade 7'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));
            $("#classAdviser").prop("selectedIndex", 0).change();

            $('.adviseHide').hide();
            $('.Grade7').show();

        }else if($('#gradeLevel').val() == 'Grade 8'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));
            $("#classAdviser").prop("selectedIndex", 0).change();

            $('.adviseHide').hide();
            $('.Grade8').show();

        }else if($('#gradeLevel').val() == 'Grade 9'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));
            $("#classAdviser").prop("selectedIndex", 0).change();

            $('.adviseHide').hide();
            $('.Grade9').show();

        }else if($('#gradeLevel').val() == 'Grade 10'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));
            $("#classAdviser").prop("selectedIndex", 0).change();

            $('.adviseHide').hide();
            $('.Grade10').show();

        }else{
            $('#gradeLevelIcon').val('');
            $("#classAdviser").prop("selectedIndex", 0).change();
            $('.adviseHide').hide();
        }
    });
}

//Onchange of Selection of Grade
function gradeLevel2(){
        if($('#gradeLevel').val() == 'Grade 1'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));

            $('.adviseHide').hide();
            $('.Grade1').show();

        }else if($('#gradeLevel').val() == 'Grade 2'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));

            $('.adviseHide').hide();
            $('.Grade2').show();

        }else if($('#gradeLevel').val() == 'Grade 3'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));

            $('.adviseHide').hide();
            $('.Grade3').show();

        }else if($('#gradeLevel').val() == 'Grade 4'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));

            $('.adviseHide').hide();
            $('.Grade4').show();

        }else if($('#gradeLevel').val() == 'Grade 5'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));

            $('.adviseHide').hide();
            $('.Grade5').show();

        }else if($('#gradeLevel').val() == 'Grade 6'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));

            $('.adviseHide').hide();
            $('.Grade6').show();

        }else if($('#gradeLevel').val() == 'Grade 7'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));

            $('.adviseHide').hide();
            $('.Grade7').show();

        }else if($('#gradeLevel').val() == 'Grade 8'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));
            

            $('.adviseHide').hide();
            $('.Grade8').show();

        }else if($('#gradeLevel').val() == 'Grade 9'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));

            $('.adviseHide').hide();
            $('.Grade9').show();

        }else if($('#gradeLevel').val() == 'Grade 10'){
            $('#gradeLevelIcon').val($('#gradeLevel option:selected').attr('data-icon'));

            $('.adviseHide').hide();
            $('.Grade10').show();

        }else{
            $('#gradeLevelIcon').val('');
            $('.adviseHide').hide();
        }
}





</script>

@endsection

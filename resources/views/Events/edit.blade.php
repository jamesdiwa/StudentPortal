@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<form class="form-horizontal" method="POST" action="{{route('events.update',$tasks->id)}}">
@csrf
@method('PUT')
<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title d-inline">School Calendar</p>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3">
            <div class="form-row mt-2">
                <div class="form-group col-sm-12">
                    <label class="input-label">Title</label>
                    <input type="text" class="form-control" name="name" value="{{$tasks->name}}" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Description</label>
                    <textarea class="form-control" name="description">{{$tasks->description}}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label class="input-label">Date</label>
                    <input type="date" class="form-control" name="task_date" value="{{$tasks->task_date}}" required>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <div class="col-sm-12">
                    <button type="submit" class="save-button">Save</button>
                    <button type="button" class="back-button float-right" onclick="window.location='{{ route('events.index') }}'">Back</button>
                </div>
            </div>
        </div>
    </div>
</div>

</form>
@endsection
{{-- 
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script> --}}
{{-- <script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script> --}}
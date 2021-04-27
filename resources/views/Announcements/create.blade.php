@extends('layouts.master')

@section('content')

@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">School Announcements</p>
        </div>
    </div>
    <div class="container">
        <form action="{{ route('announcement.store') }}" method="post">
        {{ csrf_field() }}
        <div class="DivTemplate mt-3">
            <div class="form-row mt-2">
                    <div class="form-group col-sm-12">
                        <label class="input-label">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label class="input-label">Announcement</label>
                        <textarea class="form-control" name="announcement"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label class="input-label">Date From</label>
                        <input type="date" class="form-control" name="date_from">
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="input-label">Date To</label>
                        <input type="date" class="form-control" name="date_to">
                    </div>
                </div>
                <div class="row mt-3 mb-2">
                    <div class="col-sm-12">
                        <button type="submit" class="save-button">Save</button>
                        <button type="button" class="back-button float-right" onclick="window.location='{{ route('announcement.index') }}'">Back</button>
                    </div>
                </div>
        </form>
    </div>
</div>
@endsection

{{-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script> --}}
{{-- <script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script> --}}
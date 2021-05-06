@extends('layouts.master')

@section('content')

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title d-inline">School Announcements</p>
            <button class="float-right create-button" onclick="window.location='{{ route('announcement.create')  }}'">Create</button>
        </div>
    </div>
    <div class="container">     
        @if($announcement != '[]')
        <div class="DivTemplate mt-3 py-4">
            @foreach($announcement as $announcement)
            <button style="submit" class="delete-button mx-1 float-right" onclick="submitDelete(this)">Delete</button>
            <form class="deleteForm" method='POST' action='{{ route('announcement.destroy', $announcement->id) }}'>
                @csrf
                @method('DELETE')
            </form>
            <button type="button" class="update-button float-right mx-1" onclick="window.location='{{ route('announcement.edit',$announcement->id) }}'">Update</button>
                <div class="row mt-2">
                    <div class="col-sm-12">
                        <p class="p-0 m-0 data">{{$announcement->title}} (From {{ \Carbon\Carbon::parse($announcement->date_from)->format('M d, Y') }} to {{ \Carbon\Carbon::parse($announcement->date_to)->format('M d, Y') }})</p>
                        <p class="label p-0 m-0">{{$announcement->announcement}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        @else
        <div class="DivTemplate mt-3 py-3">
            <p class="sub-title p-0 m-0">No announcements yet</p>
        </div>
        @endif
    </div>
</div>

<script>
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

    function submitDelete(thisBtn){
        $(thisBtn).closest("div").find('.deleteForm').submit();
    }
</script>

@endsection
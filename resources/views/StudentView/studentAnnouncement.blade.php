@extends('layouts.master')

@section('content')

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@include('layouts.vtabStudent')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title">School Announcements</p>
        </div>
    </div>
    <div class="container">     
        @if($announcement != '[]')
        <div class="DivTemplate mt-3 py-4">
            @foreach($announcement as $announcement)
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

@endsection
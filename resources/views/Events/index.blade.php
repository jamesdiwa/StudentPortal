@extends('layouts.master')

@section('content')

<style>
    .fc-content{
        /* background: #a90011; */
        color: #ffffff;
    }
    /* .fc-event{
        border: 1px solid #a90011;
    } */
    .fc-today-button{
        background: #a90011;
    }
</style>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="row header-bg" style="margin-top: 70px">
        <div class="col-sm-12">
            <p class="header-title d-inline">School Calendar</p>
            <button class="float-right create-button" onclick="window.location='{{ route('events.create')  }}'">Create</button>
        </div>
    </div>
    <div class="container">
        <div class="DivTemplate mt-3">
            <div id='calendar' class="mb-3 mt-3"></div>
        </div>
    </div>
</div>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                //reference at the bottom part of the code
            ]
        })
    });
</script>
@endsection
{{-- 
@foreach($tasks as $task)
    {
        title : '{{ $task->name }}',
        start : '{{ $task->task_date }}',
        
    },
@endforeach --}}
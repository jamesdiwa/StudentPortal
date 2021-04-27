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
    .dashboard-census{
    background: #fff;
    height: 74px;
    width: 100%;
    border-radius: 6px;
    box-shadow: 3.5px 3.5px 3.5px rgba(46, 46, 46, 0.3);
}
.census-label{
    font-size: 13px; 
    font-weight: 500; 
    color: #676767; letter-spacing: 1px;
    padding: 0;
    margin: 0;
}
.census-data{
    font-size: 30px; 
    font-weight: 700; 
    color: #676767;
    margin: 0;
    padding: 0;
}
.dashboard-title{
    font-size: 14px; 
    font-weight: 600; 
    color: #676767; 
    letter-spacing: 1px;

}
.dashboard-banner{
    background-image: url('images/dashboard.jpg'); 
    height: 250px; 
    width: 900px; 
    background-size: cover; 
    border-radius: 10px; 
    background-repeat: no-repeat;
}
@media(min-width: 1500px){
    .dashboard-banner{
        width: 1000px;
        margin-top: 90px !important;
    }
}
</style>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@include('layouts.vtab')

<div class="content content-margin pb-2" id="content">
    <div class="container" style="margin-top: 65px">
        <div class="mx-auto dashboard-banner">
            <?php 
            use Carbon\Carbon;
            $dt = Carbon::now();
            $dt->toDateTimeString();
            $date = $dt->format('l jS \\of F Y'); 
            date_default_timezone_set("Asia/Manila");
            $time = date("h:i A");
            ?>
            <div style="padding: 60px">
                <p class="p-0 m-0" style="color:#fff; font-size: 60px; font-weight: 700; letter-spacing: 1px">{{$time}}</p>
                <p class="p-0 m-0 mt-n3" style="color:#fff; font-size: 25px; font-weight: 500; letter-spacing: 1px">{{$date}}</p>
            </div>
        </div>
        <div class="row mt-3" style="margin-left: 45px; margin-right:  45px">
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="mx-auto d-block px-3 dashboard-census p-2">
                            <p class="census-label">Enlisted Students</p>
                            <p class="census-data mt-n1">10</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mx-auto d-block px-3 dashboard-census p-2">
                            <p class="census-label">Enrolled Students</p>
                            <p class="census-data mt-n1">10</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mx-auto d-block px-3 dashboard-census p-2">
                            <p class="census-label">Teachers</p>
                            <p class="census-data mt-n1">10</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="DivTemplate">
                            <p class="dashboard-title p-0 m-0">Announcements</p>
                            <div style="width: 100%; height: 146px; overflow-y: auto">
                                <table class="table table-borderless mt-1">
                                    <tbody class="tbody-data">
                                        <tr>
                                            <td class="px-0 font-weight-normal" width="90px">05/20/2021</td>
                                            <td class="px-0">List of active announcements</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="DivTemplate">
                    <p class="dashboard-title p-0 m-0">Upcoming School Events</p>
                    <div style="width: 100%; height: 236px; overflow-y: auto">
                        <table class="table table-borderless mt-1">
                            <tbody class="tbody-data">
                                <tr>
                                    <td class="px-0 font-weight-normal" width="90px">05/20/2021</td>
                                    <td class="px-0">Filtered on most recent upcoming events prior to date today</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready( function () {
    $('#TblSorter1').DataTable();
    });

</script>

@endsection
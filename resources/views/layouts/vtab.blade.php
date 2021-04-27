<style>
    .vtab-icon{
        width: 50px;
        font-size: 19px;
    }
</style>

    <div class="sidebar" id="sidebar">
        <div class="pt-5 mt-3 pb-2 px-3">
            <div class="mt-2 rounded-circle overflow-hidden" style="width: 80px; height: 80px; border: 2px solid white;">
                <img src="{{ asset('images/1.jpg') }}" style="width: 100%; height: 100%">
            </div>
            
            <p class="mt-2 p-0 m-0" style="color: #3d3d3d; font-weight: 700; font-size: 20px">James Patrick Diwa</p>
            <p class="p-0 m-0" style="color: #676767; font-size: 15.5px">Administrator</p>
        </div>
        <div class="mt-3" style="border-bottom: 2px solid #d11d27"></div>
        <div class="mt-4">
            <a href="{{ url('/home') }}" class="v-tabs @if (Session::get("vtab") == 'home') active @endif"><i class="fas fa-chart-line vtab-icon"></i>Dashboard</a>
            <a href="{{ url('/students') }}" class="v-tabs @if (Session::get("vtab") == 'students') active @endif"><i class="fas fa-user-alt vtab-icon"></i>Students</a>
            <a href="{{ route('events.index') }}" class="v-tabs @if (Session::get("vtab") == 'events') active @endif"><i class="far fa-calendar-alt vtab-icon"></i>School Calendar</a>
            <a href="{{ route('announcement.index') }}" class="v-tabs @if (Session::get("vtab") == 'announcement') active @endif"><i class="fas fa-bullhorn vtab-icon"></i>School Announcements</a>
            <a href="{{ route('classSchedule.index') }}" class="v-tabs @if (Session::get("vtab") == 'classSchedule') active @endif"><i class="far fa-clock vtab-icon"></i>Class Schedules</a>
            <a href="{{ route('user.index') }}" class="v-tabs @if (Session::get("vtab") == 'user') active @endif"><i class="far fa-address-card vtab-icon"></i>User Management</a>
        </div>
    {{-- <a href="{{ route('user.index') }}" class="v-tabs @if (Session::get("vtab") == 'user') active @endif">User Management</a>
    <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="accordion v-tabs">Events and Announcements</a>
    <div id="collapseExample" class="collapse @if (Session::get("vtab") == 'user' || Session::get("vtab") == 'accounting' || Session::get("vtab") == 'enrollment' || Session::get("vtab") == 'grading') hide @else show @endif">
        <a href="{{ route('announcement.index') }}" class="v-tabs @if (Session::get("vtab") == 'announcement') active @endif"><i class="ml-4 fas fa-caret-right mr-2"></i>School Announcements</a>
        <a href="{{ route('events.index') }}" class="v-tabs @if (Session::get("vtab") == 'events') active @endif"><i class="ml-4 fas fa-caret-right mr-2"></i>School Events</a>
    </div>
    <a href="{{ route('enrollment.index') }}" class="v-tabs @if (Session::get("vtab") == 'enrollment') active @endif">Enrollment</a>
    <a href="{{ route('accounting.index') }}" class="v-tabs @if (Session::get("vtab") == 'accounting') active @endif">Accounting</a>
    <a href="{{ route('grading.index') }}" class="v-tabs @if (Session::get("vtab") == 'grading') active @endif">Grading Administration</a>
    <a href="{{ route('grading.index') }}" class="v-tabs @if (Session::get("vtab") == 'grading') active @endif">Class Schedule</a> --}}
     
    </div>
    
    <script>
        var box = document.getElementById('sidebar');
        new SimpleBar(box);
    </script>
    



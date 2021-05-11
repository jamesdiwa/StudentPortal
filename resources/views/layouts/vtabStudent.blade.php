<style>
    .vtab-icon{
        width: 50px;
        font-size: 19px;
    }
</style>

    <div class="sidebar" id="sidebar">
        <div class="pt-5 mt-5 pb-2 px-3">
            <div class="mt-2 rounded-circle overflow-hidden" style="width: 110px; height: 110px">
                @if (Session::get("loginphotoPath") != null)
                <img src="{{ asset('images/UserPhoto/'.Session::get("loginphotoPath")) }}" style="width: 100%; height: 100%">
            @else
                  <img class="rounded-circle" src="{{ asset('images/1.jpg') }}" style="width: 100%; height: 100%; border: 1px solid #0fceca">
            @endif
            </div>
            
            <p class="mt-2 p-0 m-0" style="color: #3d3d3d; font-weight: 700; font-size: 20px">{{Session::get("loginFirstName")}}  {{Session::get("loginmiddleName")}}  {{Session::get("loginlastName")}}</p>
            <p class="p-0 m-0" style="color: #676767; font-size: 15.5px">{{Session::get("loginaccountType")}}</p>
        </div>
        <div class="mt-3" style="border-bottom: 2px solid #d11d27"></div>
        <div class="mt-4">
            <a href="{{ url('/studentCalendar') }}" class="v-tabs @if (Session::get("vtab") == 'events') active @endif"><i class="far fa-calendar-alt vtab-icon"></i>School Calendar</a>
            <a href="{{ url('/studentAnnouncement') }}" class="v-tabs @if (Session::get("vtab") == 'announcement') active @endif"><i class="fas fa-bullhorn vtab-icon"></i>School Announcements</a>
            <a href="{{ url('/studentGrade') }}" class="v-tabs @if (Session::get("vtab") == 'grading') active @endif"><i class="fas fa-calculator vtab-icon"></i>My Grades</a>
            <a href="{{ url('/studentAccount') }}" class="v-tabs @if (Session::get("vtab") == 'account') active @endif"><i class="fas fa-file-invoice-dollar vtab-icon"></i>My Account</a>
            <a href="{{ url('/studentClassSchedule') }}" class="v-tabs @if (Session::get("vtab") == 'schedule') active @endif"><i class="far fa-clock vtab-icon"></i>My Schedule</a>
        </div>
    </div>
    
    <script>
        var box = document.getElementById('sidebar');
        new SimpleBar(box);
    </script>
    



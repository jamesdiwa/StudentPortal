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
            <p class="p-0 m-0" style="color: #676767; font-size: 15.5px">A117A0909</p>
        </div>
        <div class="mt-3" style="border-bottom: 2px solid #d11d27"></div>
        <div class="mt-4">
            <a href="#" class="v-tabs"><i class="far fa-calendar-alt vtab-icon"></i>School Calendar</a>
            <a href="#" class="v-tabs"><i class="fas fa-bullhorn vtab-icon"></i>School Announcements</a>
            <a href="#" class="v-tabs"><i class="fas fa-calculator vtab-icon"></i>My Grades</a>
            <a href="#" class="v-tabs"><i class="fas fa-file-invoice-dollar vtab-icon"></i>My Account</a>
            <a href="{{ route('classSchedule.index') }}" class="v-tabs @if (Session::get("vtab") == 'classSchedule') active @endif"><i class="far fa-clock vtab-icon"></i>My Schedule</a>
        </div>
    </div>
    
    <script>
        var box = document.getElementById('sidebar');
        new SimpleBar(box);
    </script>
    



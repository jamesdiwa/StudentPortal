<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::post('register/newStudent', 'NewStudentController@registerNew')->name('registerNewStudent');


Auth::routes();

Route::group(['middleware' => 'auth'], function() {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/changePassword','HomeController@showChangePasswordForm');
    Route::post('/changePassword','HomeController@changePassword')->name('changePassword');


    //Enrollment
    
    Route::get('enroll/grade1', 'EnrollmentController@Grade1Index')->name('Grade1Index');
    Route::get('enroll/grade2', 'EnrollmentController@Grade2Index')->name('Grade2Index');
    Route::get('enroll/grade3', 'EnrollmentController@Grade3Index')->name('Grade3Index');
    Route::get('enroll/grade4', 'EnrollmentController@Grade4Index')->name('Grade4Index');
    Route::get('enroll/grade5', 'EnrollmentController@Grade5Index')->name('Grade5Index');
    Route::get('enroll/grade6', 'EnrollmentController@Grade6Index')->name('Grade6Index');
    Route::get('enroll/grade7', 'EnrollmentController@Grade7Index')->name('Grade7Index');
    Route::get('enroll/grade8', 'EnrollmentController@Grade8Index')->name('Grade8Index');
    Route::get('enroll/grade9', 'EnrollmentController@Grade9Index')->name('Grade9Index');
    Route::get('enroll/grade10', 'EnrollmentController@Grade10Index')->name('Grade10Index');
    

    Route::post('enroll/create/','EnrollmentController@enrollCreate')->name('enrollCreate');

    Route::post('enroll/show/','EnrollmentController@enrollShow')->name('enrollShow');
    
    Route::post('accounting/create/','AccountingController@paymentCreate')->name('paymentCreate');


    Route::post('grade/','GradingController@studentGradeStore')->name('studentGradeStore');

    

    Route::resource('studentList','StudentController');
    Route::resource('newStudent','NewStudentController');
    Route::resource('user','UserController');
    Route::resource('events', 'EventsController');
    Route::resource('announcement', 'AnnouncementController');
    Route::resource('accounting', 'AccountingController');
    Route::resource('enrollment', 'EnrollmentController');
    Route::resource('grading', 'GradingController');

    Route::resource('classSchedule', 'ClassScheduleController');
    Route::post('create/createSchedSubject', 'ClassScheduleController@createSchedSubject')->name('createSchedSubject');
    Route::post('create/createSchedSubjectStore', 'ClassScheduleController@createSchedSubjectStore')->name('createSchedSubjectStore');

    Route::post('create/editSchedSubject', 'ClassScheduleController@editSchedSubject')->name('editSchedSubject');
    Route::post('create/editSchedSubjectUpdate', 'ClassScheduleController@editSchedSubjectUpdate')->name('editSchedSubjectUpdate');

    

});

//Student View
Route::get('studentCalendar', 'StudentViewController@studentCalendar');
Route::get('studentAnnouncement', 'StudentViewController@studentAnnouncement');
Route::get('studentGrade', 'StudentViewController@studentGrade');
Route::get('studentAccount', 'StudentViewController@studentAccount');
Route::get('studentClassSchedule', 'StudentViewController@studentClassSchedule');

//Teacher View
Route::get('teacherCalendar', 'TeacherViewController@teacherCalendar');
Route::get('teacherAnnouncement', 'TeacherViewController@teacherAnnouncement');
Route::get('gradingIndex', 'TeacherViewController@index');
Route::get('gradingShow', 'TeacherViewController@show');
Route::get('gradingEdit', 'TeacherViewController@edit');
Route::get('gradingBySection', function(){
    return view('TeacherView.teacherGrade.gradingBySection');
});

Route::get('user-show', function(){
    return view('User.show');
});
Route::get('newStudent-show', function(){
    return view('Students.NewStudent.show');
});

Route::get('classSchedule-show', function(){
    return view('ClassSchedules.show');
});

Route::get('accounting-show', function(){
    return view('Students.Accounting.show');
});
Route::get('accounting-edit', function(){
    return view('Students.Accounting.edit');
});

Route::get('grading-show', function(){
    return view('Students.Grading.show');
});
Route::get('grading-edit', function(){
    return view('Students.Grading.edit');
});

Route::get('studentList-show', function(){
    return view('Students.StudentList.show');
});

Route::get('enlist-student', function(){
    return view('Students.NewStudent.enlist');
});

Route::get('/students', function(){
    return view('Students.studentsSelection');
});

Route::get('/gradeSelection', function(){
    return view('Students.Enrollment.gradeSelection');
});
Route::get('/showStudent', function(){
    return view('Students.Enrollment.show');
});
Route::get('/grade1', function(){
    return view('Students.Enrollment.grade1Index');
});
Route::get('/grade2', function(){
    return view('Students.Enrollment.grade2Index');
});
Route::get('/grade3', function(){
    return view('Students.Enrollment.grade3Index');
});
Route::get('/grade4', function(){
    return view('Students.Enrollment.grade4Index');
});
Route::get('/grade5', function(){
    return view('Students.Enrollment.grade5Index');
});
Route::get('/grade6', function(){
    return view('Students.Enrollment.grade6Index');
});
Route::get('/grade7', function(){
    return view('Students.Enrollment.grade7Index');
});
Route::get('/grade8', function(){
    return view('Students.Enrollment.grade8Index');
});
Route::get('/grade9', function(){
    return view('Students.Enrollment.grade9Index');
});
Route::get('/grade10', function(){
    return view('Students.Enrollment.grade10Index');
});

Route::get('/events-edit', function(){
    return view('Events.edit');
});

Route::get('samplepdf', 'PdfController@samplePdf')->name('samplepdf');

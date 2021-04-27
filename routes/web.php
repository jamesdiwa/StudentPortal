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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::group(['middleware' => 'auth'], function() {

    Route::resource('studentList','StudentController');
    Route::resource('newStudent','NewStudentController');
    Route::resource('user','UserController');
    Route::resource('events', 'EventsController');
    Route::resource('announcement', 'AnnouncementController');
    Route::resource('accounting', 'AccountingController');
    Route::resource('enrollment', 'EnrollmentController');
    Route::resource('grading', 'GradingController');
    Route::resource('classSchedule', 'ClassScheduleController');


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

Route::get('/students', function(){
    return view('Students.studentsSelection');
});

Route::get('samplepdf', 'PdfController@samplePdf')->name('samplepdf');

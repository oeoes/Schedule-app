<?php

Route::get('/preview', 'ScheduleNewVersion@home');
// API
Route::get('/preview/api/304', 'ScheduleNewVersion@lab304');
Route::get('/preview/api/304/check', 'ScheduleNewVersion@lab304Cek');
Route::get('/preview/api/302', 'ScheduleNewVersion@lab302');
Route::get('/preview/api/302/check', 'ScheduleNewVersion@lab302Cek');
Route::get('/preview/api/303', 'ScheduleNewVersion@lab303');
Route::get('/preview/api/303/check', 'ScheduleNewVersion@lab303Cek');
Route::get('/preview/api/401', 'ScheduleNewVersion@lab401');
Route::get('/preview/api/401/check', 'ScheduleNewVersion@lab401Cek');
Route::get('/preview/api/402', 'ScheduleNewVersion@lab402');
Route::get('/preview/api/402/check', 'ScheduleNewVersion@lab402Cek');
Route::get('/preview/api/403', 'ScheduleNewVersion@lab403');
Route::get('/preview/api/403/check', 'ScheduleNewVersion@lab403Cek');

/* Dosen Authentication */
Route::prefix('lecturer')->group(function() {
    Route::get('/', 'UserController@lecturerHome')->name('lecturer.home')->middleware('auth', 'auth-dosen', 'account-checker');
    Route::get('/login', 'UserController@lecturerLogin')->name('lecturer.login');
    Route::post('/login/auth', 'UserController@lecturerAuth')->name('lecturer.auth');
    Route::get('/signup', 'UserController@lecturerSignup')->name('lecturer.signup');
    Route::post('/signup/auth', 'UserController@lecturerSignupAuth')->name('lecturer.signup.auth');
    Route::get('/claim', 'UserController@claim')->name('claim')->middleware(['auth', 'auth-dosen']);
    Route::get('/claim/{id}', 'UserController@claimLecturer')->name('claim.lecturer')->middleware(['auth', 'auth-dosen']);
    Route::get('/start/{id}', 'UserController@startCourse')->name('start');
    Route::get('/stop/{id}', 'UserController@stopCourse')->name('stop');
});
/* Dosen Authentication */

Route::prefix('schedule')->group(function(){
    // Api
    Route::prefix('list')->group(function(){
        Route::get('/', 'AppController@courseList');
        Route::get('/state', 'AppController@changeState');
    });
    Route::get('/api/lecturers', 'AppController@apiLecturer')->name('lecturer');

    Route::get('/', 'AppController@index')->name('home');
    Route::get('/lecturers', 'AppController@lecturer')->name('lecturer');
    Route::get('/sort/room/{id}/{state}', 'AppController@sortRoom')->name('sort.room');

    Route::prefix('dashboard')->group(function(){
        Route::get('/', 'DashboardController@home')->name('home.dashboard');
        Route::get('/lecturers', 'DashboardController@lecturer')->name('lecturer.dashboard');
        Route::post('/lecturers/add', 'DashboardController@addLecturer')->name('lecturer.add');
        Route::post('/add', 'DashboardController@addCourse')->name('add.course');
        Route::get('/sort/course', 'DashboardController@sortCourse')->name('sort.course');
        Route::post('/update', 'DashboardController@updateCourse')->name('update.course');
        Route::get('/delete/{id}', 'DashboardController@deleteCourse')->name('delete.course');

        // Api 
        Route::get('/api/lecturers', 'DashboardController@apiLecturer');
        Route::get('/api/lecturers/{id}', 'DashboardController@apiLecturerSetState');

        Route::get('/login', 'SessionController@login')->name('login');
        Route::post('/login/auth', 'SessionController@loginAuth')->name('login.auth');
        Route::get('/logout', 'SessionController@logout')->name('logout');
    });
});


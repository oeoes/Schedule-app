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

Route::prefix('schedule')->group(function(){
    // Api
    Route::prefix('list')->group(function(){
        Route::get('/', 'AppController@courseList');
    });

    Route::get('/', 'AppController@index')->name('home');
    Route::get('/sort/room/{id}/{state}', 'AppController@sortRoom')->name('sort.room');

    Route::prefix('dashboard')->group(function(){
        Route::get('/', 'DashboardController@home')->name('home.dashboard');
        Route::post('/add', 'DashboardController@addCourse')->name('add.course');
        Route::get('/sort/course', 'DashboardController@sortCourse')->name('sort.course');
        Route::post('/update', 'DashboardController@updateCourse')->name('update.course');
        Route::get('/delete/{id}', 'DashboardController@deleteCourse')->name('delete.course');

        Route::get('/login', 'SessionController@login')->name('login');
        Route::post('/login/auth', 'SessionController@loginAuth')->name('login.auth');
        Route::get('/logout', 'SessionController@logout')->name('logout');
    });
});


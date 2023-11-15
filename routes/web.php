<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/colleges', 'HomeController@colleges')->name('colleges');
Route::get('/aboutus', 'HomeController@aboutus')->name('aboutus');
Route::middleware(['guest:admin', 'guest:professor', 'guest:student'])->group(function () {
    Route::get('/admin/login', 'AdminController@showLoginForm')->name('admin.login');
    Route::get('/professor/login', 'ProfessorController@showLoginForm')->name('professor.login');
    Route::get('/student/login_register', 'StudentController@showLoginRegister')->name('student.login_register');
});


Route::middleware(['auth:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('/profile', 'AdminController@profile')->name('profile');
    Route::get('/settings', 'AdminController@settings')->name('settings');
    // Route::get('/changePassword', 'AdminController@changePassword')->name('changePassword');
    Route::get('/logout', 'AdminController@logout')->name('logout');
    Route::prefix('/college')->name('college.')->group(function () {
        Route::get('/index', 'CollegeController@index')->name('index');
        Route::get('/edit', 'CollegeController@edit')->name('edit');
        Route::get('/show', 'CollegeController@show')->name('show');
        Route::delete('/delete', 'CollegeController@delete')->name('delete');

    });
    Route::prefix('/professor')->name('professor.')->group(function () {
        Route::get('/index', 'ProfessorController@index')->name('index');
        Route::get('/edit', 'ProfessorController@edit')->name('edit');
        Route::delete('/delete', 'ProfessorController@delete')->name('delete');

    });
});

Route::middleware(['auth:professor'])->name('professor.')->prefix('professor')->group(function () {
    Route::get('/dashboard', 'ProfessorController@dashboard')->name('dashboard');
    Route::get('/profile', 'ProfessorController@profile')->name('profile');
    Route::get('/settings', 'ProfessorController@settings')->name('settings');
    Route::get('/changePassword', 'ProfessorController@changePassword')->name('changePassword');
    Route::get('/logout', 'ProfessorController@logout')->name('logout');
});


Route::middleware(['auth:student'])->name('student.')->prefix('student')->group(function () {
    Route::get('/profile', 'StudentController@profile')->name('profile');
    Route::get('/settings', 'StudentController@settings')->name('settings');
    Route::get('/changePassword', 'StudentController@changePassword')->name('changePassword');
    Route::get('/logout', 'StudentController@logout')->name('logout');
});

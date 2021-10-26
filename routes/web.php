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

//login

Route::get('/', 'App\Http\Controllers\LoginController@login')->name('login');

Route::POST('/','App\Http\Controllers\LoginController@authenticate')->name('authenticate');

Route::get('/index','App\Http\Controllers\DashboardController@index')->name('user.index');

Route::POST('/index','App\Http\Controllers\DashboardController@store')->name('user.add');

Route::get('/fetchemployed','App\Http\Controllers\DashboardController@fetchemployed')->name('employed.load');



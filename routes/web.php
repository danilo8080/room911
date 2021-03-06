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

Route::get('/', 'App\Http\Controllers\LoginController@login')->name('login')->middleware('guest');

Route::POST('/','App\Http\Controllers\LoginController@authenticate')->name('authenticate');

Route::get('/index','App\Http\Controllers\DashboardController@index')->name('user.index');

Route::POST('/index','App\Http\Controllers\DashboardController@store')->name('employed.add');

Route::get('/fetchemployed','App\Http\Controllers\DashboardController@fetchemployed')->name('employed.load');

Route::get('editEmployed/{id}','App\Http\Controllers\DashboardController@edit')->name('employed.edit');

Route::PUT('updateEmployed/{id}','App\Http\Controllers\DashboardController@update')->name('employed.update');

Route::DELETE('deleteEmployed/{id}','App\Http\Controllers\DashboardController@delete')->name('employed.delete');

Route::PUT('access/{id}','App\Http\Controllers\DashboardController@access')->name('employed.access');

Route::get('/logout','App\Http\Controllers\LoginController@logout')->name('logout');

Route::get('/employedLogin','App\Http\Controllers\loginEmployedController@login')->name('employed.login');

Route::POST('/employedLogin','App\Http\Controllers\loginEmployedController@authenticate')->name('employed.authenticate');

Route::get('/employedDashboard','App\Http\Controllers\EmployedController@dashboard')->name('employed.dashboard');

Route::get('/record','App\Http\Controllers\DashboardController@fetchemployedRecord')->name('employed.record');

Route::post('/download','App\Http\Controllers\DashboardController@download')->name('employed.download');

//admin

Route::get('/adminIndex','App\Http\Controllers\AdminController@index')->name('user.admin');

Route::get('/fetchadmin','App\Http\Controllers\AdminController@fetchadmin')->name('admin.load');

Route::POST('/adminIndex','App\Http\Controllers\AdminController@store')->name('admin.add');

Route::get('editAdmin/{id}','App\Http\Controllers\AdminController@edit')->name('admin.edit');

Route::PUT('updateAdmin/{id}','App\Http\Controllers\AdminController@update')->name('admin.update');

Route::DELETE('deleteAdmin/{id}','App\Http\Controllers\AdminController@delete')->name('admin.delete');

//import

Route::POST('/importEmployeds','App\Http\Controllers\DashboardController@import')->name('employed.import');
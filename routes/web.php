<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
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
Route::middleware('auth')->group(function () {
Route::get('/', 'DashboardController@projects')->name('projects');
Route::get('/cards/{id}', 'DashboardController@cards')->name('cards');
//Route::get('/projects', 'DashboardController@projects')->name('projects');
Route::get('/projectcreate','DashboardController@projectcreate')->name('projectcreate');
Route::get('/flowcreate/{id}','DashboardController@flowcreate')->name('flowcreate');
Route::get('/dashboard','DashboardController@dashboard')->name('dashboard');
Route::get('/cardcreate/{id}','DashboardController@cardcreate')->name('cardcreate');
Route::get('/carditemcreate/{id}','DashboardController@carditemcreate')->name('carditemcreate');
Route::get('/deletecard/{id}','DashboardController@deletecard')->name('deletecard');
Route::get('/deletecarditem/{id}','DashboardController@deletecarditem')->name('deletecarditem');
Route::get('/deleteproject/{id}','DashboardController@deleteproject')->name('deleteproject');
Route::get('/addusertoproject/{userid}/{projectid}','DashboardController@addusertoproject')->name('addusertoproject');
Route::get('/allflowdata/{id}','DashboardController@allflowdata')->name('allflowdata');

Route::get('/generateppt/{id}','ExportController@generateppt')->name('generateppt');


Route::post('/addcard','DashboardController@addcard')->name('addcard');
Route::post('/addcarditem','DashboardController@addcarditem')->name('addcarditem');
Route::post('/addproject','DashboardController@addproject')->name('addproject');
Route::post('/addflow','DashboardController@addflow')->name('addflow');
Route::post('/adduidatas','DashboardController@adduidatas')->name('adduidatas');
Route::post('/finduser','DashboardController@finduser')->name('finduser');\
Route::post('/getallusers','DashboardController@getallusers')->name('getallusers');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
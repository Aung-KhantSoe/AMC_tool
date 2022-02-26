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

Route::get('/', 'DashboardController@index')->name('home');

Route::get('/projects', function () {
    return view('projects');
})->name('projects');

Route::get('/projectcreate',function(){
    return view('projectcreate');
})->name('projectcreate');

Route::get('/dashboard','DashboardController@dashboard')->name('dashboard');

Route::get('/cardcreate',function(){
    return view('cardcreate');
})->name('cardcreate');
Route::get('/carditemcreate','DashboardController@carditemcreate')->name('carditemcreate');
Route::get('/deletecard/{id}','DashboardController@deletecard')->name('deletecard');
Route::get('/deletecarditem/{id}','DashboardController@deletecarditem')->name('deletecarditem');


Route::post('/addcard','DashboardController@addcard')->name('addcard');
Route::post('/addcarditem','DashboardController@addcarditem')->name('addcarditem');


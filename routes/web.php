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

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return redirect('/login');
});
Route::get('/login', 'LoginController@showLoginPage');
Route::post('/login', 'LoginController@doLogin');
Route::get('/sample', 'Sample\\AnotherController@showSamplePage');

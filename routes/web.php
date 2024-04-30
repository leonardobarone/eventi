<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes([
    'login' => true,
    'reset' => false,
    'confirm' => false,
    'verify' => false,
    'register' => false,
    'password.update' => false,
]);


Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->namespace('Auth')->name('auth.')->prefix('auth')->group(function(){
    Route::resource('events', 'EventController')->except('show');
});

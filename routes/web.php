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
    return view('start');
});


//just for testing
Route::get('cards',function(){

    return view('cards');
});


//just for testing
Route::get('user',function(){

    return view('userprofile');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/updateprofile','ModifyUserController@modify');

Route::get('/tr', 'PagesController@testRobvan');

Route::resource('plats','platsController');


Route::post('/sendAjax','platsController@addToCart');
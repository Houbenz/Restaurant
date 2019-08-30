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


//just for testing
Route::get('cards',function(){

    return view('cards');
});


//just for testing
Route::get('user',function(){

    return view('userprofile');
});

Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/updateprofile','ModifyUserController@modify');

Route::get('/tr', 'PagesController@testRobvan');

Route::get('/panier','PagesController@modifierPanier');

Route::post('/removePlatFromPanier','PagesController@removePlatFromPanier');

Route::resource('plats','platsController');

Route::post('/sendAjax','platsController@addToCart');

Route::get('/test',function(){

    return view('commandes');

});
Route::resource('commande','commandeController');

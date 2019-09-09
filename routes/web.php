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


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home','CommandeController@index')->name('home');

Route::post('/updateprofile','ModifyUserController@modify');

Route::get('/recherchePlats','PagesController@recherchePlats');


//--------------------Pages controller-------------------

Route::get('/', 'PagesController@index');
Route::get('/tr', 'PagesController@testRobvan');

Route::get('/panier','PagesController@modifierPanier');

Route::get('/listeCommandes','pagesController@listeCommandes');

Route::post('/etatCommande','pagesController@etatCommande');

Route::post('/removePlatFromPanier','PagesController@removePlatFromPanier');

//-----------------------end pages controller-------------------------------

Route::resource('plats','platsController');

Route::post('/sendAjax','platsController@addToCart');

Route::get('/test',function(){

    return view('commandes');

});
Route::resource('commandes','commandeController');

Route::resource('messages','MessageController');

Route::post('/storeMessage','MessageController@store');

// admin routes 
Route::get('/adminHome','AdminController@adminHome');

Route::get('/register_user','AdminController@registerUserRoute');

Route::post('/registerUser','AdminController@registerUser');

Route::get('/all_users','AdminController@getUsers');

Route::post('/modify','AdminController@modify');
Route::post('/bloque','AdminController@bloque');

Route::get('/listAdmin','AdminController@getAllCommandes');
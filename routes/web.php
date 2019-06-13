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
Route::middleware(['auth'])->group(function (){
    Route::get('/home', 'PubgController@home')->name('pubg.home');
    Route::post('/logout', 'Auth\LoginController@logout')->name('pubg.logout');
    Route::post('/accept-team/{team_id}', 'PubgController@accept')->name('pubg.accept');

});
Route::middleware(['guest'])->group(function (){
    Route::get('/', 'PubgController@index')->name('pubg.register');
    Route::post('/', 'PubgController@savePlayer');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('pubg.login');
    Route::post('/login', 'Auth\LoginController@login');
});

Route::get('/rules', 'PubgController@rules')->name('pubg.rules');

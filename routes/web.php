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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'explore'],function (){
    Route::get('create','ExploreController@create')->middleware('auth');
    Route::get('index','ExploreController@index');
    Route::post('store','ExploreController@store');
    Route::get('/{explore_id}','ExploreController@exploreInfo');
});
Route::group(['prefix' => 'avatar'],function (){
    Route::post('/store','AvatarController@store');
    Route::get('/create','AvatarController@create')->middleware('auth');
    Route::get('/{user_id}','AvatarController@avatar');
});
Route::group(['prefix' => 'video'],function (){
   Route::get('/index/{id}','VideoController@index');
   Route::get('/create','VideoController@create')->middleware('auth');
   Route::post('/store','VideoController@store');
});
Route::group(['prefix' => 'direct'],function (){
    Route::get('/receiverMessage','DirectController@connect');
    Route::get('/chatRoom/live','DirectController@chatRoom');
    Route::get('/chatRoom/camera','DirectController@cameraRoom');
});
Route::group(['prefix' => 'class'],function (){
    Route::post('/follow','ClassController@classFollow');
});

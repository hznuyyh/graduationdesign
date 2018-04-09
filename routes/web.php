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
    Route::post('store','ExploreController@store')->middleware('auth');
    Route::get('/{explore_id}','ExploreController@exploreInfo')->middleware('auth');
    Route::post('goodToExplore','ExploreController@goodToExplore')->middleware('auth');
    Route::post('followToExplore','ExploreController@followToExplore')->middleware('auth');
    Route::post('addCommentToExplore','ExploreController@addCommentToExplore')->middleware('auth');

});
Route::group(['prefix' => 'avatar'],function (){
    Route::post('/store','AvatarController@store')->middleware('auth');
    Route::get('/create','AvatarController@create')->middleware('auth')->middleware('auth');
    Route::get('/{user_id}','AvatarController@avatar')->middleware('auth');
});
Route::group(['prefix' => 'video'],function (){
   Route::get('/index/{id}','VideoController@index')->middleware('auth');
   Route::get('/create','VideoController@create')->middleware('auth');
   Route::post('/store','VideoController@store')->middleware('auth');
});
Route::group(['prefix' => 'direct'],function (){
    Route::get('/receiverMessage','DirectController@connect');
    Route::get('/chatRoom/live','DirectController@chatRoom')->middleware('auth');
    Route::get('/chatRoom/camera','DirectController@cameraRoom')->middleware('auth');
});
Route::group(['prefix' => 'class'],function (){
    Route::post('/follow','ClassController@classFollow')->middleware('auth');
});

Route::group(['prefix' => 'user'],function (){
    Route::get('/index','UserRelationController@index')->middleware('auth');
    Route::get('/messageList','UserRelationController@getMessageList')->middleware('auth');
    Route::post('/relation','UserRelationController@relationOther')->middleware('auth');
    Route::post('/message','UserRelationController@receiveMessage')->middleware('auth');
    Route::post('/changeMessageUser','UserRelationController@changeMessageUser')->middleware('auth');
});

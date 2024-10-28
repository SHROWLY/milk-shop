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

Auth::routes();

Route::get('/', 'UserController@viewprofile')->middleware('auth');


Route::post('/rating/{id}', 'AddController@rating')->middleware('auth');
Route::get('/survey/{id}', 'UserController@complaintsview')->middleware('auth');
Route::get('/billdetails/{id}', 'UserController@billdetails')->middleware('auth');
Route::post('/survey/{id}', 'UserController@store')->middleware('auth');
Route::post('/survey/{id}/poor', 'UserController@storepoor')->middleware('auth');
Route::get('/addquantity={id}', 'UserController@addquantity')->middleware('auth');
Route::post('/addquantity={id}', 'UserController@billingadd')->middleware('auth');

/*
Admin Panel Routes
*/

Route::get('/print/{id}/{dategot}', 'AddController@billprint')->middleware('admin');

Route::get('/admin', 'AdminController@panel')->middleware('admin');

Route::get('/houses', 'AdminController@housesview')->middleware('admin');

Route::get('/month/{id}', 'AddController@bymonth')->middleware('admin');

Route::get('/house/{id}/details', 'AddController@housedetails')->middleware('admin');
Route::get('/inactive', 'AdminController@inactivehouses')->middleware('admin');
Route::get('/house={id}', 'AdminController@houseview')->middleware('admin');
Route::get('/houseadd', 'AdminController@houseaddview')->middleware('admin');
Route::post('/houseadd', 'AdminController@store')->middleware('admin');
Route::get('/house/{id}/delete', 'AdminController@housedelete')->middleware('admin');
Route::get('/houseedit{id}', 'AdminController@houseeditview')->middleware('admin');
Route::post('/houseupdate{id}', 'AdminController@houseupdate')->middleware('admin');
Route::get('/housesbycategory/{id}/view', 'AdminController@housescategory')->middleware('admin');

Route::post('/recieved/{id}', 'AddController@recieved')->middleware('admin');
Route::get('/recieved/{id}/{dategot}/{where}', 'AddController@recievedstatus')->middleware('admin');
Route::post('/recieved/{id}/{date}/add', 'AddController@recievedadd')->middleware('admin');
Route::get('/recieved/{id}/delete', 'AddController@recieveddelete')->middleware('admin');

Route::post('/billing/{id}/add', 'AdminController@billingadd')->middleware('admin');
Route::get('/billing/{id}/edit', 'AdminController@billingedit')->middleware('admin');
Route::post('/billing/{id}/edit', 'AdminController@billingupdate')->middleware('admin');
Route::get('/billing/{id}/delete', 'AdminController@billingdelete')->middleware('admin');


Route::get('/category', 'AddController@category')->middleware('admin');
Route::post('/category', 'AddController@categoryadd')->middleware('admin');
Route::get('/category/{id}/edit', 'AddController@categoryedit')->middleware('admin');
Route::post('/category/{id}/edit', 'AddController@categoryupdate')->middleware('admin');
Route::get('/category/{id}/delete', 'AddController@categorydelete')->middleware('admin');

Route::get('/area', 'AddController@area')->middleware('admin');
Route::post('/area', 'AddController@areaadd')->middleware('admin');
Route::post('/area/{id}/edit', 'AddController@areaupdate')->middleware('admin');
Route::get('/area/{id}/delete', 'AddController@areadelete')->middleware('admin');

Route::get('/users', 'AdminController@usersview')->middleware('admin');
Route::get('/addauser', 'AdminController@addauser')->middleware('admin');
Route::post('/addauser', 'AdminController@register')->middleware('admin');

Route::post('/userassign/{id}', 'AddController@userassign')->middleware('admin');

Route::post('/paidupdate', 'AddController@paidupdate')->middleware('admin');

Route::get('/user{id}', 'AdminController@userview')->middleware('admin');
Route::get('/useredit/{id}', 'AdminController@useredit')->middleware('admin');
Route::post('/useredit/{id}', 'AdminController@usereditstore')->middleware('admin');
Route::get('/userdelete/{id}', 'AdminController@userdelete')->middleware('admin');

Route::get('/surveyresult', 'UserController@surveyresult')->middleware('admin');
Route::get('/survey/{id}/delete', 'UserController@surveydelete')->middleware('admin');


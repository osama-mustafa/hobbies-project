<?php

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

Route::get('/', function () {

    return view('starting_page');

})->name('home');

Route::get('/info', function () {

    return view('info');

})->name('info');


// Routes For Hobbies

Route::get('/hobby', 'HobbyController@index')->name('hobby');

Route::get('/hobby/create', 'HobbyController@create')->name('hobby.create');

Route::post('/hobby', 'HobbyController@store')->name('hobby.store');

Route::get('/hobby/{hobby}', 'HobbyController@show')->name('hobby.show');

Route::get('/hobby/{hobby}/edit', 'HobbyController@edit')->name('hobby.edit');

Route::put('/hobby/{hobby}', 'HobbyController@update')->name('hobby.update');

Route::delete('/hobby/{hobby}', 'HobbyController@destroy')->name('hobby.delete');



// Routes For Users

Route::get('/user', 'UserController@index')->name('user');

Route::get('/user/{user}', 'UserController@show')->name('user.show');

Route::get('/user/{user}/edit', 'UserController@edit')->name('user.edit');

Route::put('/user/{user}', 'UserController@update')->name('user.update');

Route::delete('/user/{user}', 'UserController@destroy')->name('user.delete');





// Routes For Tags

Route::get('/tag', 'TagController@index')->name('tag');

Route::get('/tag/create', 'TagController@create')->name('tag.create');

Route::post('/tag', 'TagController@store')->name('tag.store');

Route::get('/tag/{tag}/edit', 'TagController@edit')->name('tag.edit');

Route::put('/tag/{tag}', 'TagController@update')->name('tag.update');

Route::delete('/tag/{tag}', 'TagController@destroy')->name('tag.delete');


// Route For  Hobby_tags

Route::get('hobby/tag/{tag_id}', 'hobbyTagController@getFilteredHobbies')->name('hobby.tag')->middleware('auth');



// Routes For Attach & Detach Tags For Hobbies

Route::get('/hobby/{hobby_id}/tag/{tag_id}/attach', 'hobbyTagController@attachTag')->name('attach.tag')->middleware('auth');

Route::get('/hobby/{hobby_id}/tag/{tag_id}/detach', 'hobbyTagController@detachTag')->name('detach.tag')->middleware('auth');


// Delete Images of Hobbies

Route::get('/delete-images/hobby/{hobby_id}', 'hobbyController@deleteImages')->name('delete.images');


//Delete Image of User

Route::get('/delete-images/user/{user_id}', 'UserController@deleteImages')->name('delete.images.user');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home_page');

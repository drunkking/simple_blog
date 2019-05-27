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

Route::get('/','HomePagesController@index');
Route::get('/blog/{date}/{title}', 'HomePagesController@show');


Auth::routes();


Route::group(['middleware' => ['auth']], function () {

    Route::resource('/home/posts','PostsController');
    Route::resource('/home/categories','CategoriesController');
    Route::resource('/home/tags','TagsController');
});



Route::get('/home', 'HomeController@index')->name('home');

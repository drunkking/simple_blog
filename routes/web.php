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
Route::get('/contact','HomePagesController@contact');
Route::post('/contact','HomePagesController@storeMessage');
Route::get('/blog/{date}/{title}', 'HomePagesController@show');
Route::get('/categories/{category_name}', 'HomePagesController@postsWithCategory');
Route::get('/tag/{tag_name}', 'HomePagesController@postsWithTag');


//Auth::routes(['register' => false]);
Auth::routes();


Route::group(['middleware' => ['auth']], function () {

    Route::resource('/home/posts','PostsController');
    Route::resource('/home/categories','CategoriesController');
    Route::resource('/home/tags','TagsController');
    Route::resource('/home/messages','ContactMessagesController');
});



Route::get('/home', 'HomeController@index')->name('home');

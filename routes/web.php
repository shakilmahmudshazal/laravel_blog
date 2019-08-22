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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/','PostsController@index')->name('home');
Route::get('/post/{id}','PostsController@show');
Route::get('/posts/create','PostsController@create');
Route::get('/','PostsController@showAll')->name('home');
Route::get('/home','PostsController@showAll');


Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');


 Route::get('/login','SessionController@create')->name('login');
 Route::post('/login','SessionController@store');


Route::get('/logout','SessionController@destroy');





Route::post('/posts','PostsController@store');
Route::post('/posts/{post}/comments','CommentsController@store');


// Auth::routes();
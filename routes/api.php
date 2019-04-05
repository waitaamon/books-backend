<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', 'auth\RegisterController@index');
Route::post('/login', 'auth\LoginController@index');
Route::post('/logout', 'auth\LogoutController@logout');

//protect login users
Route::group(['middleware' => 'jwt.auth'], function (){

    //authenticated user details
    Route::get('/me', 'auth\UserController@index');

    //books
    Route::resource('/books', 'admin\BookController');

    //publish
    Route::post('/book/publish/{id}', 'admin\BookController@publish');

    //languages
    Route::resource('/languages', 'admin\LanguageController');

    //genres
    Route::resource('/genres', 'admin\GenreController');

    //topics
    Route::resource('/topics', 'admin\TopicController');

    //gallery images
    Route::resource('/images', 'admin\GalleryController');
});


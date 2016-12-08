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

Route::get('privacy', function () {
    return view('privacy');
});

Route::get('terms', function () {
    return view('terms');
});

Route::group(['middleware' => ['guest']], function () {
    Route::get('/signup', 'AuthController@getSignup')->name('signup');
    Route::post('/signup', 'AuthController@postSignup');
    Route::get('/login', 'AuthController@getLogin')->name('login');
    Route::post('/login', 'AuthController@postLogin');
});

Route::get('/logout', 'AuthController@getLogout')->name('logout');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('/', 'DashController@getDashboard')->name('dashboard');

    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', 'DashController@getTags')->name('tags');
        Route::post('/', 'DashController@postTags');
        Route::get('new', 'DashController@getNewTag');
        Route::post('new', 'DashController@postNewTag');
        Route::get('{id}', 'DashController@getTag')->where('id', '[0-9]+');
        Route::post('{id}', 'DashController@postTag')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'bookmarks'], function () {
        Route::get('/', 'DashController@getBookmarks')->name('bookmarks');
        Route::post('/', 'DashController@postBookmarks');
        Route::get('new', 'DashController@getNewBookmark');
        Route::post('new', 'DashController@postNewBookmark');
        Route::get('{id}', 'DashController@getBookmark')->where('id', '[0-9]+');
        Route::post('{id}', 'DashController@postBookmark')->where('id', '[0-9]+');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'AdminController@getDashboard');
    Route::get('tags', 'AdminController@getTags');
    Route::post('tags', 'AdminController@postTags');
    Route::get('bookmarks', 'AdminController@getBookmarks');
    Route::post('bookmarks', 'AdminController@postBookmarks');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'AdminController@getUsers')->name('users');
        Route::post('/', 'AdminController@postUsers');
        Route::get('new', 'AdminController@getNewUser');
        Route::post('new', 'AdminController@postNewUser');
        Route::get('{id}', 'AdminController@getUser')->where('id', '[0-9]+');
        Route::post('{id}', 'AdminController@postUser')->where('id', '[0-9]+');
    });
});

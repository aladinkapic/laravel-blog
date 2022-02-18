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

Route::group(['namespace' => 'Posts', 'prefix' => '/'], function(){
    Route::get ('/',                             'PostsController@index')->name('posts.index');

    Route::get ('/create-new',                   'PostsController@create')->name('posts.create');
    Route::post('/save',                         'PostsController@save')->name('posts.save');
    Route::get ('/preview-post/{id}',            'PostsController@preview')->name('posts.preview');
});

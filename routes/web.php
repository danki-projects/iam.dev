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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/projects', 'ProjectContoller@index')->name('project');
Route::get('/contact', 'ContactContoller@index')->name('contact');

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

Route::group(['prefix' => 'blog'], function () {
    Route::get('/{category_slug}', 'CategoryController@index')->name('blog.categories');
    Route::get('/{category_slug}/{post_slug}', 'PostController@index')->name('blog.post');
});


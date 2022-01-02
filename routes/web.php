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
Route::get('/search/{params?}', 'HomeController@search')->name('search');

Route::get('/projects', 'ProjectController@index')->name('project');
Route::get('/projects/{project_slug}', 'ProjectController@show')->name('project.show');

Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact', 'ContactController@store')->name('contact.store');

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

Route::group(['prefix' => 'blog'], function () {
    Route::get('/{category_slug}', 'CategoryController@index')->name('blog.categories');
    Route::get('/{category_slug}/{post_slug}', 'PostController@index')->name('blog.post');
    Route::post('/{category_slug}/{post_slug}', 'PostController@comment')->name('blog.comment');
});


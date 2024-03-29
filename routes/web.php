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

Auth::routes();

Route::middleware('auth')
->namespace('Admin')
->prefix('admin')
->name('admin.')
->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
});

Route::get('/contacts', 'Guest\ContactUsController@index')->name('guest.contact');
Route::post('/contacts', 'Guest\ContactUsController@sendRequest')->name('guest.storeContact');

Route::get('/{any}', 'Guest\HomeController@index')->where('any','.*');

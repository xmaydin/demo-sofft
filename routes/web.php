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

Route::group(['namespace' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', 'indexController@index')->name('index');
    Route::get('/addnew', 'indexController@addNew')->name('addnew');
    Route::post('/addnew', 'indexController@store')->name('addnew.post');
    Route::get('/{id}', 'indexController@delete')->name('delete');
    Route::get('/edit/{id}', 'indexController@edit')->name('edit');
    Route::post('/edit/{id}', 'indexController@update')->name('edit.post');
});

Route::get('/', function () {
    return view('welcome');
});

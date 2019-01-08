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
})->middleware('auth');

Auth::routes();

Route::get('/getCurrentUser', function () {
    return Auth::user();
});

Route::get('/messages', 'MessageController@index');

Route::post('/messages', 'MessageController@store')->middleware('auth');

Route::get('/{any?}', function () {
    return view('welcome');
})->where('any', '^(.*)\/?$')->name('welcome');

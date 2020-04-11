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

Route::get('/', 'StudentsController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('students/create', 'StudentsController@create');
Route::post('students', 'StudentsController@store');

Route::patch('students/{student}', 'StudentsController@update')->name('students.update');
Route::get('students/{student}/edit', 'StudentsController@edit');

Route::get('students', 'StudentsController@index');


Route::get('notices', 'NoticesController@index');
Route::get('notices/create', 'NoticesController@create');
Route::post('notices', 'NoticesController@store');
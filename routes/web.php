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

Route::get('/', function () {
    return view('welcome');
})->middleware('checklogin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('checklogin');

Route::get('/book','Crud\BookController@index')->middleware('checklogin');
Route::post('/book_save','Crud\BookController@store')->middleware('checklogin');
Route::get('/bookShow','Crud\BookController@show')->middleware('checklogin');
Route::get('book/edit/{id}','Crud\BookController@edit')->middleware('checklogin');
Route::post('book/update','Crud\BookController@update')->middleware('checklogin');
Route::get('/book/delete/{id}','Crud\BookController@delete')->middleware('checklogin');

Route::get('user','UserController@index');





//////////Author
Route::get('/author','Crud\AuthorController@index')->middleware('checklogin');
Route::post('/author/update','Crud\AuthorController@store')->middleware('checklogin');
// Route::get('/authorshow','Crud\AuthorController@get');
Route::get('/author/edit/{id}','Crud\AuthorController@edit')->middleware('checklogin');
Route::post('/author/update','Crud\AuthorController@update')->middleware('checklogin');
Route::get('/author/delete/{id}','Crud\AuthorController@delete')->middleware('checklogin');
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

Route::get('book','Crud\BookController@index')->middleware('checklogin');
Route::post('booksave','Crud\BookController@storeBook')->middleware('checklogin');
Route::get('book_show','Crud\BookController@getAllBook')->middleware('checklogin');
Route::get('book/edit/{id}','Crud\BookController@edit')->middleware('checklogin');
Route::post('book/update','Crud\BookController@update')->middleware('checklogin');
Route::get('book/delete/{id}','Crud\BookController@delete')->middleware('checklogin');

Route::get('user','UserController@index');





//////////Author
Route::get('/author','Crud\AuthorController@index')->middleware('checklogin');
Route::post('/author/update','Crud\AuthorController@store')->middleware('checklogin');
// Route::get('/authorshow','Crud\AuthorController@get');
Route::get('/author/edit/{id}','Crud\AuthorController@edit')->middleware('checklogin');
Route::post('/author/update','Crud\AuthorController@update')->middleware('checklogin');
Route::get('/author/delete/{id}','Crud\AuthorController@delete')->middleware('checklogin');
Route::get('/publisher','Crud\PublisherController@index')->middleware('checklogin');
Route::post('/publisher/update','Crud\PublisherController@store')->middleware('checklogin');
//Route::post('/publisher','Crud\PublisherController@get');
Route::get('/publisher/edit/{id}','Crud\PublisherController@edit')->middleware('checklogin');
Route::post('/publisher/update','Crud\PublisherController@update')->middleware('checklogin');
Route::get('/publisher/delete/{id}','Crud\PublisherController@delete')->middleware('checklogin');
//////////Category
Route::get('category','Crud\CategoryController@index')->middleware('checklogin');
Route::post('/category/update','Crud\CategoryController@store')->middleware('checklogin');
//Route::post('/category','Crud\CategoryController@get');
Route::get('/category/edit/{id}','Crud\CategoryController@edit')->middleware('checklogin');
Route::post('/category/update','Crud\CategoryController@update')->middleware('checklogin');
Route::get('/category/delete/{id}','Crud\CategoryController@delete')->middleware('checklogin');



Route::get('/user','Crud\FrontEndController@index');
Route::get('/book/{id}','Crud\FrontEndController@getBookId');

Route::post('/cart/book','Crud\CartController@add');
Route::get('/cart','Crud\CartController@addByCart');
Route::get('/remove/book/{id}','Crud\CartController@removeCart');
Route::post('/cart/update','Crud\CartController@update');
Route:get('admin','admin');
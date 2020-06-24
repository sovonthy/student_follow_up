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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function (){
    return view('auth.login');
});
Route::resource('students', 'StudentController');
Route::resource('comments', 'CommentController');
Route::get('/viewOutFollow', 'StudentController@viewOutFollow')->name('viewOutFollow');
Route::get('/addStudent/{id}', 'StudentController@addStudent')->name('addStudent');
Route::post('/addComment/{id}', 'CommentController@addComment')->name('addComment');
Route::get('/removeComment/{id}', 'CommentController@removeComment')->name('removeComment');
Route::get('/updateComment/{id}', 'CommentController@updateComment')->name('updateComment');



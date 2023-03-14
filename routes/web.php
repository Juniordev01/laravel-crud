<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin_',[BooksController::class,'index'])->name('admin');

Route::view('register','Admin.register')->name('register');
Route::get('/login_',[App\Http\Controllers\Auth\LoginController::class,'index'])->name('userLogin');
Route::get('insert',[BooksController::class,'add']);
Route::post('submit',[BooksController::class,'submit']);

Route::get('display',[BooksController::class,'fetch'])->name('display');
Route::match(['get', 'post'],'delete/{id}',[BooksController::class,'destroy']);
Route::get('edit/{id}',[BooksController::class,'get']);

Route::post('update',[BooksController::class,'updateBook']);

Route::get('view_detail/{id}',[BooksController::class,'show']);

Route::post('search',[BooksController::class,'result']);

Route::view('searchResult','searchResult');

Route::post('date_filter',[BooksController::class,'filter']);
// Route::get('admins',[BooksController::class,'index']);














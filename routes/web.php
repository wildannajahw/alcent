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
});

Auth::routes();
Route::match(["GET", "POST"], "/register", function(){
    return redirect("/login");
    })->name("register");
Route::get('/home', 'HomeController@index')->name('home');
Route::resource("users", "UserController");

Route::get('/kelass/trash', 'KelasController@trash')->name('kelass.trash');
Route::get('/kelass/{id}/restore', 'KelasController@restore')->name('kelass.restore');
Route::delete('/kelass/{id}/delete-permanent', 'KelasController@deletePermanent')->name('kelass.delete-permanent');
Route::resource("kelass", "KelasController");

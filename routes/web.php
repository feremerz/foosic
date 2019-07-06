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

Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Admin')->prefix('admin')->group(function (){
    Route::get('', function () {
        return view('admin.index');
    })->name('admin.index');
    Route::resource('users','UserController');
    Route::resource('roles','RoleController');
    Route::resource('categories','CategoryController');
    Route::resource('albums','AlbumController');
    Route::resource('artists','ArtistController');
    Route::resource('songs','SongController');
});



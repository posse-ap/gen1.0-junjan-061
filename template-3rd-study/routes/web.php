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

Route::get("webapp", "CrazyController@index");
Route::get("webapp/news", "CrazyController@news");
Route::get('/news/{id}', 'CrazyController@detail')->name('detail');
Route::get("webapp/admin", "CrazyController@admin")->name('admin');

Route::post("webapp/admin/{user_id}/update_user", "CrazyController@update_user")->name('admin.update_user');
Route::post("webapp/admin/{user_id}/destroy_user", "CrazyController@destroy_user")->name('admin.destroy_user');

Route::post("webapp/admin/store_content", "CrazyController@store_content")->name('admin.store_content');
Route::post("webapp/admin/{content_id}/update", "CrazyController@update_content")->name('admin.update_content');
Route::post("webapp/admin/{content_id}/destroy", "CrazyController@destroy_content")->name('admin.destroy_content');

Route::post("webapp/admin/store_language", "CrazyController@store_language")->name('admin.store_language');
Route::post("webapp/admin/{language_id}/update_language", "CrazyController@update_language")->name('admin.update_language');
Route::post("webapp/admin/{language_id}/destroy_language", "CrazyController@destroy_language")->name('admin.destroy_language');

Route::post("webapp/add", "CrazyController@add")->name('add');

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
<?php
use App\Http\Middleware\HelloMiddleware;
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


Route::get("quiz", "QuestionController@index");
Route::get("admin", "CrazyController@index")->name('admin');

Route::get("admin/question/{question_id}", "CrazyController@edit_title")->name('admin.question');
Route::post("admin/question/{question_id}/update", "CrazyController@update_title")->name('admin.update_question');
Route::post("admin/question/store", "CrazyController@store_title")->name('admin.store_question');
Route::post("admin/destroy", "CrazyController@destroy_title")->name('admin.destroy_title');

Route::get("admin/theme/{question_id}", "CrazyController@edit_theme")->name('admin.theme');
Route::post("admin/theme/{question_id}/update", "CrazyController@update_theme")->name('admin.update_theme');
Route::post("admin/theme/store", "CrazyController@store_theme")->name('admin.store_theme');
Route::post("admin/theme/destroy", "CrazyController@destroy_question")->name('admin.delete');

Route::get("admin/choice/{theme_id}", "CrazyController@edit_choice")->name('admin.choice');
Route::post("admin/choice/{theme_id}/update", "CrazyController@update_choice")->name('admin.update_choice');
Route::post("admin/choice/{theme_id}/store", "CrazyController@store_choice")->name('admin.store_choice');



Route::post("admin/delete", "CrazyController@destroy_question")->name('admin.delete');
Route::get("quiz/{id}", "quizyController@show");

Route::get('scss', function () {
    return view('for-scss');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

Route::get("admin/theme/{question_id}", "CrazyController@edit_theme")->name('admin.theme');
Route::post("admin/theme/{question_id}/update", "CrazyController@update_theme")->name('admin.update_theme');

Route::get("admin/choice/{theme_id}", "CrazyController@edit_choice")->name('admin.choice');

// Route::get("admin/question/{question_id}/edit", "CrazyController@TitleEdit")->name('admin.TitleEdit');
// Route::post("admin/{question_id}/edit/{theme_id}/update", "CrazyController@update")->name('admin.update');
// Route::post("admin/{question_id}/edit/{theme_id}/update", "CrazyController@")->name('admin.update');

Route::post("admin/delete", "CrazyController@destroy")->name('admin.delete');
Route::get("quiz/{id}", "quizyController@show");

Route::get('scss', function () {
    return view('for-scss');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

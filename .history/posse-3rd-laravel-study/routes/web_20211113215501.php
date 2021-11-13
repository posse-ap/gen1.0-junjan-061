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

Route::get("admin/{question_id}", "CrazyController@show")->name('admin.show');

Route::get("admin/{question_id}/edit/{theme_id}", "CrazyController@edit")->name('admin.edit');

Route::post("admin/{question_id}/edit/{theme_id}/update", "CrazyController@update")->name('admin.update');

Route::post("admin/delete", "CrazyController@destroy")->name('admin.delete');

Route::get("quiz/{id}", "quizyController@show");

// Route::get("admin", "QuestionController@index");
// Route::get("admin/rest", "quizyController@create");

Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@post');

Route::get('person', 'PersonController@index');

Route::get('hello/add', 'HelloController@add');
Route::post('hello/add', 'HelloController@create');

Route::get('hello/edit', 'HelloController@edit');
Route::post('hello/edit', 'HelloController@update');

Route::get('hello/del', 'HelloController@del');
Route::post('hello/del', 'HelloController@remove');

Route::get('hello/show', 'HelloController@show');

Route::get('person/find', 'PersonController@find');
Route::post('person/find', 'PersonController@search');

Route::get('hello/rest', 'HelloController@rest');

Route::get('hello/session', 'HelloController@ses_get');
Route::post('hello/session', 'HelloController@ses_put');

Route::get('scss', function () {
    return view('for-scss');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

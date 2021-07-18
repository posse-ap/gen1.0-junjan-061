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

Route::get('/quiz', function () {
    return view('quizyList');
});

Route::get("quiz/1", "quizyController@index");
Route::get("quiz/2", "quizyController@index2");

Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@post');

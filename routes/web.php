<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserLogin;
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

Route::get('/', 'TodosController@index');
Route::post('add', 'TodosController@add');
Route::get('delete/{id}', 'TodosController@delete');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
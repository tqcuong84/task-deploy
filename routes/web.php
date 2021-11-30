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

Route::get('/', 'HomeController@index')->name('signin');
Route::post('/', 'HomeController@index');

Route::get('signup', 'HomeController@signup');
Route::post('signup', 'HomeController@signup');

Route::get('signout', 'HomeController@signout');

Route::get('dashboard', 'DashboardController@index')->name('dashboard')->middleware(UserLogin::class);
Route::post('deploy', 'DashboardController@deploy')->middleware(UserLogin::class);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
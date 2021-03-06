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

Route::get('/', 'SiteController@index');
Route::get('/user', 'UserController@index');
Route::get('/goods/{id}', 'GoodsController@index');
Route::get('/cart', 'CartController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * Admin后端路由
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::any('/login', ['uses' => 'AdminController@login']);
    Route::any('/logout', ['uses' => 'AdminController@logout']);

    Route::group(['middleware' => ['web', 'admin.auth']], function () {
        Route::get('/', ['uses' => 'HomeController@index']);
    });
});


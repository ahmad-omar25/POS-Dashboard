<?php

use Illuminate\Support\Facades\Route;

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

Route::group(
    ['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
    function()
    {
        Route::group(['prefix' => 'admin', 'namespace' => 'Dashboard', 'middleware' => 'auth'], function () {

            // Users Routes
            Route::resource('users', 'UserController')->except('show');

            // Categories Routes
            Route::resource('categories', 'CategoryController')->except('show');

            // Products Routes
            Route::resource('products', 'ProductController')->except('show');

            // Clients Routes
            Route::resource('clients', 'ClientController')->except('show');
            Route::resource('clients.orders', 'OrderController')->except('show');

            // Dashboard Route
            Route::get('dashboard', 'HomeController@index')->name('admin');

        });

        // Auth Routes
        Auth::routes();
});
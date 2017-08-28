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

Route::get('/fill/products', 'PaytraqController@fill_products')->name('fill_products');
Route::get('/fill/qty', 'PaytraqController@fill_qty')->name('fill_qty');
Route::group([
    'middleware' => 'auth'
    ], function () {
        Route::get('/update_finans', 'PaytraqController@update_finans')->name('update_finans');
        Route::get('/main', 'PaytraqController@main')->name('main');
        Route::get('/group_products/{id?}', 'PaytraqController@get_products_by_group')->name('group_products');
        Route::get('/get_product/{id}', 'PaytraqController@get_product')->name('get_product');
        Route::post('/order/{id}', 'PaytraqController@order')->name('order');
        Route::get('/my_orders_links/{id}', 'PaytraqController@my_orders_links')->name('my_orders_links');
        Route::get('/my_orders_pdf/{id}', 'PaytraqController@my_orders_pdf')->name('my_orders_pdf');
        Route::get('/profile', 'PaytraqController@profile')->name('profile');
    });
Auth::routes();

Route::get('activate/{id}/{token}', 'Auth\RegisterController@activation')->name('activation');
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



/**      Admin       **/
//Route::get('/admin/login','Admin\AdminController@index')->name('admin.login');

Route::group(['prefix' => 'admin'], function (){

//    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
//    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


    /** Product type */

    Route::resource('product_type','Admin\ProductTypeController',["except" => ["create","show", "edit"]]);
    Route::get('add_product_type/{id}','Admin\ProductTypeController@movePageCreateType')
            ->name('admin.addType');
    Route::resource('add_new','Admin\AddTypeController',["except" => ["create","show", "edit"]]);
    Route::get('product_type/{id}','Admin\ProductTypeController@changeStatus')
        ->name('product_type.changeStatus');

    /** Product */

    Route::resource('products','Admin\ProductController');
    Route::post('products/change_cost/{id}','Admin\ProductController@changeCost')
        ->name('product_change_cost');
    Route::post('products/change_avatar/{id}','Admin\ProductController@changeAvatar')
        ->name('product_change_avatar');
    Route::post('products/change_multi_image/{id}','Admin\ProductController@changeMultiImage')
        ->name('product_change_multi_image');

    /**      Employee       **/
    Route::resource('employees','Admin\EmployeeController');

    /**      orders       **/
    Route::resource('orders','Admin\OrderController');

    /**      Goods receipt notes       **/
    Route::resource('goods_receipt','Admin\GoodsReceiptNotesController');
    Route::resource('goods_receipt_detail','Admin\GoodsReceiptNotesDetailController');

    /**      Sales offs       **/
    Route::resource('sales_offs','Admin\SalesOffsController');
});


/**      Customer       **/


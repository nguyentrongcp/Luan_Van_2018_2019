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
Route::get('/admin/login', function (){
   return view('admin.auth.login');
});


Route::group(['prefix' => 'admin'], function (){

//    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
//    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


    /** Foody type */

    Route::resource('foody_type','Admin\FoodyTypeController',["except" => ["create","show", "edit"]]);
    Route::get('add_foody_type/{id}','Admin\FoodyTypeController@movePageCreateType')
            ->name('admin.addType');
    Route::resource('add_new','Admin\AddTypeController',["except" => ["create","show", "edit"]]);


    /** Foody */

    Route::resource('foodies','Admin\FoodyController');
    Route::post('foodies/change_cost/{id}','Admin\FoodyController@changeCost')
        ->name('foody_change_cost');
    Route::post('foodies/change_avatar/{id}','Admin\FoodyController@changeAvatar')
        ->name('foody_change_avatar');
    Route::post('foodies/change_multi_image/{id}','Admin\FoodyController@changeMultiImage')
        ->name('foody_change_multi_image');

    /**      Employee       **/
    Route::resource('employees','Admin\EmployeeController');

    /**      orders       **/
    Route::resource('orders','Admin\OrderController');

    /**      Goods receipt notes       **/
    Route::resource('goods_receipt','Admin\GoodsReceiptNotesController');
    Route::resource('goods_receipt_detail','Admin\GoodsReceiptNotesDetailController');

    /**      Sales offs       **/
    Route::resource('sales_offs','Admin\SalesOffsController');

    /**      Shop information       **/
    Route::resource('shop_infos','Admin\ShopInfoController');

    /**      News       **/
    Route::resource('news','Admin\NewsController');
//    Route::get('news/{id}','Admin\NewsController');

});


/**      Customer       **/

Route::get('test', 'Customer\TestController@test')->name('test');

    // Home
    Route::get('/', 'Customer\CustomerController@index')->name('customer.home');

    // Index
    Route::get('/type', 'Customer\IndexController@index')->name('customer.index');
    Route::get('/type/{slug}', 'Customer\IndexController@showFoody');
    Route::post('/customer/like', 'Customer\IndexController@like');
    Route::post('/customer/favorite', 'Customer\IndexController@favorite');

    Route::post('/login', 'Customer\CustomerLoginController@login')->name('customer.login.submit');
    Route::get('logout/', 'Customer\CustomerLoginController@logout')->name('customer.logout');
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
})->name('admin.login');
Route::post('/admin/login', 'admin\AdminLoginController@login')->name('admin.login.submit');


Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function (){

//    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'admin\AdminLoginController@logout')->name('admin.logout');

    Route::get('dashboard', function () {
        return view('admin.foodies.index');
    })->name('admin.dashboard');

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
    Route::resource('goods_receipt_note','Admin\GoodsReceiptNotesController');
    Route::get('goods_receipt_note_detail/{id}','Admin\GoodsReceiptNotesController@moveDetail')
            ->name('admin.move_detail');


    /**      Goods receipt notes detail       **/
    Route::resource('goods_receipt_note_detail','Admin\GoodsReceiptNotesDetailController');


    /**      Sales offs       **/
    Route::resource('sales_offs','Admin\SalesOffsController',["except" => ["create", "edit"]]);
    Route::get('create_sales_offs/{id}','Admin\SalesOffsController@movePageCreateSales')
        ->name('admin.createSales');
    Route::resource('create_sales','Admin\CreateSalesController',["except" => ["create","show", "edit"]]);

    Route::resource('sales_offs_details','Admin\SalesOffsDetailsController');

    /**      Shop information       **/
    Route::resource('shop_infos','Admin\ShopInfoController');
    Route::post('shop_infos/change_logo/{id}','Admin\ShopInfoController@changeLogo')
        ->name('shop_change_logo');

    /**      News       **/
    Route::resource('news','Admin\NewsController');
    Route::post('news/change_image/{id}','Admin\NewsController@changeImage')
            ->name('news_change_image');

    /** Comments **/
    Route::resource('comments', 'Admin\CommentController');




});


/**      Customer       **/

    // Test sms api
    Route::get('/testsms', 'Customer\ShoppingCartController@testAPI')->name('test.sms');

    // Index
    Route::get('/', 'Customer\CustomerController@index')->name('customer.index');

    // Home
    Route::get('/home', 'Customer\HomeController@index')->name('customer.home');
    Route::get('/type/{slug}', 'Customer\HomeController@showFoody');
    Route::post('/customer/like', 'Customer\HomeController@like');
    Route::post('/customer/favorite', 'Customer\HomeController@favorite');

    // Shopping cart
    Route::get('/testcart', 'Customer\ShoppingCartController@test')->name('cart.test');
    Route::post('/customer/add_shopping_cart', 'Customer\ShoppingCartController@addCart');
    Route::post('/customer/update_shopping_cart', 'Customer\ShoppingCartController@updateCart');
    Route::post('/customer/remove_shopping_cart', 'Customer\ShoppingCartController@removeCart');

    // Payment
    Route::get('/payment', 'Customer\PaymentController@index')->name('payment.index');
    Route::post('/customer/get_payment_otp', 'Customer\PaymentController@getOTP');
    Route::post('/customer/check_payment_otp', 'Customer\PaymentController@checkOTP');
    Route::post('/customer/get_ward', 'Customer\PaymentController@getWard');
    Route::post('/customer/get_transport_fee', 'Customer\PaymentController@getTransportFee');

    Route::get('/customer/store_order', 'Customer\PaymentController@storeOrder')->name('order.store');

    // Foody
    Route::get('/foody/{slug}', 'Customer\FoodyController@index')->name('customer.foody.show');

    // Login & logout
    Route::post('/login', 'Customer\CustomerLoginController@login')->name('customer.login.submit');
    Route::get('logout/', 'Customer\CustomerLoginController@logout')->name('customer.logout');
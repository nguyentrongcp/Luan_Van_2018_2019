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
    Route::get('/logout', 'admin\adminLoginController@logout')->name('admin.logout');

    Route::get('dashboard', function () {
        return view('admin.foodies.index');
    })->name('admin.dashboard');

    /** Foody type */

    Route::resource('foody_type','admin\FoodyTypeController',["except" => ["create","show", "edit"]]);
    Route::get('add_foody_type/{id}','admin\FoodyTypeController@movePageCreateType')
            ->name('admin.addType');
    Route::resource('add_new','admin\AddTypeController',["except" => ["create","show", "edit"]]);


    /** Foody */

    Route::resource('foodies','admin\FoodyController');
    Route::post('foodies/{id}','admin\FoodyController@update');
    Route::post('foodies/change_cost/{id}','admin\FoodyController@changeCost')
        ->name('foody_change_cost');
    Route::post('foodies/change_avatar/{id}','admin\FoodyController@changeAvatar')
        ->name('foody_change_avatar');
//    Route::post('foodies/change_multi_image/{id}','admin\FoodyController@changeMultiImage')
//        ->name('foody_change_multi_image');

    /**      Employee       **/
    Route::resource('employees','admin\EmployeeController');

    /**      orders       **/
    Route::resource('orders','admin\OrderController');

    /**      Goods receipt notes       **/
    Route::resource('goods_receipt_note','admin\GoodsReceiptNotesController');
    Route::get('goods_receipt_note_detail/{id}','admin\GoodsReceiptNotesController@moveDetail')
            ->name('admin.move_detail');


    /**      Goods receipt notes detail       **/
    Route::resource('goods_receipt_note_detail','admin\GoodsReceiptNotesDetailController');


    /**      Sales offs       **/
    Route::resource('sales_offs','admin\SalesOffsController',["except" => ["create", "edit"]]);
    Route::get('create_sales_offs/{id}','admin\SalesOffsController@movePageCreateSales')
        ->name('admin.createSales');
    Route::resource('create_sales','admin\CreateSalesController',["except" => ["create","show", "edit"]]);

    Route::resource('sales_offs_details','admin\SalesOffsDetailsController');

    /**      Shop information       **/
    Route::resource('shop_infos','admin\ShopInfoController');
    Route::post('shop_infos/change_logo/{id}','admin\ShopInfoController@changeLogo')
        ->name('shop_change_logo');

    /**      News       **/
    Route::resource('news','admin\NewsController');
    Route::post('news/change_image/{id}','admin\NewsController@changeImage')
            ->name('news_change_image');

    /** Comments **/
    Route::resource('comments', 'admin\CommentController');




});


/**      Customer       **/

    // Test sms api
    Route::get('/testsms', 'Customer\ShoppingCartController@testAPI')->name('test.sms');

    // Index
    Route::get('/', 'Customer\CustomerController@index')->name('customer.index');

    // Home
    Route::get('/home', 'Customer\HomeController@index')->name('customer.home');
    Route::post('/customer/show_foody', 'Customer\HomeController@showFoody');
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
    Route::get('/customer/search', 'Customer\FoodyController@search');

    // Login & logout
    Route::post('/customer/login', 'Customer\CustomerLoginController@login');
    Route::get('logout/', 'Customer\CustomerLoginController@logout')->name('customer.logout');
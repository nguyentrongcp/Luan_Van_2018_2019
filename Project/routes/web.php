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

    Route::get('dashboard', 'admin\DasboardController@index')->name('admin.dashboard');


    /** Statistic */

    Route::get('statistis/revenue','admin\StatisticController@revenue')->name('revenue');
    Route::get('statistis/order','admin\StatisticController@revenue')->name('order');
    Route::get('statistis/foody','admin\StatisticController@revenue')->name('foody');
    Route::get('statistic/today','admin\StatisticController@today')->name('statistic.today');
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
    Route::get('foody_type/{slug}','admin\FoodyController@showSlugType')
        ->name('foody_slug_type');
    Route::get('foodies_filter','admin\FoodyController@filter')
        ->name('foody_filter');
    Route::get('search','admin\FoodyController@search');
//
//    Route::get('test','admin\FoodyController@test');
    /**      Employee       **/

    Route::resource('employees','admin\EmployeeController');
    Route::post('employees/reset_password/{id}','admin\EmployeeController@resetPass')
        ->name('reset_pass');

    /**      orders       **/
    Route::resource('orders','admin\OrderController');
    Route::get('order_approved/{id}','admin\OrderController@orderApproved')
        ->name('order_approved');
    Route::get('order_cancelled/{id}','admin\OrderController@orderCancelled')
        ->name('order_cancelled');

    Route::get('orders/filter/{id}','admin\OrderController@filter')->name('orders_filter');

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
    Route::post('image_upload_test', 'admin\NewsController@testImage')->name('image.test');

    /** Comments **/
    Route::resource('comments', 'admin\CommentController');
    Route::post('comments/{id}','admin\CommentController@update')->name('admin.approved');
    Route::get('comments/filter/{id}','admin\CommentController@filter')->name('admin_comment_filter');

    /** Sliders **/
    Route::resource('sliders','admin\SliderController');

});


/**      Customer       **/

    // Test sms api
    Route::get('/testsms', 'Customer\ShoppingCartController@testAPI')->name('test.sms');

    // Index
    Route::get('/', 'Customer\CustomerController@index')->name('customer.index');

    // Home
    Route::get('/home', 'Customer\HomeController@index')->name('customer.home');
    Route::get('/customer/show_foody', 'Customer\HomeController@showFoody')->name('home.show_foody');
    Route::get('/customer/get_foody', 'Customer\HomeController@getFoody')->name('home.get_foody');

    // Shopping cart
    Route::get('/testcart', 'Customer\ShoppingCartController@test')->name('cart.test');
    Route::post('/customer/add_shopping_cart', 'Customer\ShoppingCartController@addCart');
    Route::post('/customer/update_shopping_cart', 'Customer\ShoppingCartController@updateCart');
    Route::post('/customer/remove_shopping_cart', 'Customer\ShoppingCartController@removeCart');

    // Payment
    Route::get('/payment', 'Customer\PaymentController@index')->name('payment.index');
    Route::post('/payment/get_payment_otp', 'Customer\PaymentController@getOTP');
    Route::post('/payment/check_payment_otp', 'Customer\PaymentController@checkOTP');
    Route::post('/payment/get_ward', 'Customer\PaymentController@getWard');
    Route::post('/payment/get_transport_fee', 'Customer\PaymentController@getTransportFee');
    Route::get('/payment/process_payment', 'Customer\PaymentController@processPayment');
    Route::get('/payment/success', 'Customer\PaymentController@successPayment');

    // Foody
    Route::get('/foody/{slug}', 'Customer\FoodyController@index')->name('customer.foody.show');
    Route::get('/customer/search', 'Customer\FoodyController@search');
    Route::post('/customer/foody/comment', 'Customer\FoodyController@comment');
    Route::post('/customer/like', 'Customer\FoodyController@like');
    Route::post('/customer/favorite', 'Customer\FoodyController@favorite');

    // Order
    Route::get('/payment/order', 'Customer\OrderController@index')->name('payment.order.index');
    Route::get('/payment/order/get', 'Customer\OrderController@getOrder');
    Route::get('/payment/order/show/{order_code}', 'Customer\OrderController@showOrder')->name('payment.order.show');
    Route::post('/payment/order/remove', 'Customer\OrderController@removeOrder');

    // News
    Route::get('/news', 'Customer\NewsController@index')->name('customer.news.index');
    Route::get('/news/content', 'Customer\NewsController@show')->name('customer.news.show');

    // Login & logout
    Route::post('/customer/login', 'Customer\CustomerLoginController@login');
    Route::get('logout/', 'Customer\CustomerLoginController@logout')->name('customer.logout');
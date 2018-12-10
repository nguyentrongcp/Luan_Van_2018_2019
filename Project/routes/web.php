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


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


/**      Admin       **/
Route::get('/admin/login', function () {
    return view('admin.auth.login');
})->name('admin.login');

Route::post('/admin/login', 'admin\AdminLoginController@login')->name('admin.login.submit');


Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

    Route::get('/logout', 'admin\adminLoginController@logout')->name('admin.logout');

    Route::get('dashboard', 'admin\DasboardController@index')->name('admin.dashboard');


    /** Statistic */

    Route::get('statistic/revenue', 'admin\StatisticController@revenue')->name('revenue')
        ->middleware('statistic');
    Route::get('statistic/today', 'admin\StatisticController@today')->name('statistic.today')
        ->middleware('statistic');
    Route::get('statistic/order', 'admin\StatisticController@order')->name('order')
        ->middleware('statistic');
    Route::get('statistic/foody', 'admin\StatisticController@foody')->name('foody')
        ->middleware('statistic');
    Route::get('statistic/order/get', 'admin\OrderStatisticController@getValue')->name('statistic.order.get')
        ->middleware('statistic');
    Route::get('statistic/revenue/get', 'admin\RevenueStatisticController@getValue')->name('statistic.revenue.get')
        ->middleware('statistic');
    Route::get('statistic/foody/get', 'admin\FoodyStatisticController@getValue')->name('statistic.foody.get')
        ->middleware('statistic');


    /** Foody type */

    Route::resource('foody_type', 'admin\FoodyTypeController', ["except" => ["create", "show", "edit"]])
        ->middleware('foodytype');
    Route::get('add_foody_type/{id}', 'admin\FoodyTypeController@movePageCreateType')->name('admin.addType')
        ->middleware('foodytype');
    Route::resource('add_new', 'admin\AddTypeController', ["except" => ["create", "show", "edit"]])
        ->middleware('foodytype');
    Route::resource('foody_type_restore', 'admin\restore\FoodyTypeRestoreController', ['only' => ['index', 'store']])
        ->middleware('foodytype');
    Route::post('foody_type_delete', 'admin\restore\FoodyTypeRestoreController@delete')->name('foody_type_delete')
        ->middleware('foodytype');

    /** Foody */

    Route::resource('foodies', 'admin\FoodyController')
        ->middleware('foody');
    Route::post('foodies/{id}', 'admin\FoodyController@update')
        ->middleware('foody');
    Route::post('foodies/change_cost/{id}', 'admin\FoodyController@changeCost')->name('foody_change_cost')
        ->middleware('foody');
    Route::post('foodies/change_avatar/{id}', 'admin\FoodyController@changeAvatar')->name('foody_change_avatar')
        ->middleware('foody');
    Route::get('foody_type/{slug}', 'admin\FoodyController@showSlugType')->name('foody_slug_type')
        ->middleware('foody');
    Route::get('foodies_filter', 'admin\FoodyController@filter')->name('foody_filter')
        ->middleware('foody');
    Route::get('foody_search', 'admin\FoodyController@search')
        ->middleware('foody');
    Route::resource('foody_restore', 'admin\restore\FoodyRestoreController', ['only' => ['index', 'store']])
        ->middleware('foody');
    Route::post('foody_delete', 'admin\restore\FoodyRestoreController@delete')->name('foody_delete')
        ->middleware('foody');
    Route::get('foodies_success/{id}', 'admin\FoodyController@success')->name('foody_success')
        ->middleware('foody');
    Route::post('foodies_material', 'admin\FoodyController@addMaterialFoody')->name('foodies_material')
        ->middleware('foody');
    Route::get('foodies_material_delete', 'admin\FoodyController@deleteMaterialFoody')->name('foodies_material_delete')
        ->middleware('foody');

    /**      Materials       **/
    Route::resource('material', 'admin\MaterialController')
        ->middleware('material');
    Route::resource('material_restore', 'admin\restore\MaterialRestoreController', ['only' => ['index', 'store','destroy']])
        ->middleware('material');
    Route::post('material_delete', 'admin\restore\MaterialRestoreController@delete')->name('material_delete')
        ->middleware('material');

    /**      Units       **/
    Route::resource('unit', 'admin\UnitController')
        ->middleware('material');

    /**      Goods receipt notes       **/
    Route::resource('goods_receipt_note', 'admin\GoodsReceiptNotesController')
        ->middleware('goodsreceiptnote');
    Route::get('goods_receipt_note_detail/{id}', 'admin\GoodsReceiptNotesController@moveDetail')
        ->name('admin.move_detail')
        ->middleware('goodsreceiptnote');
    Route::resource('goods_receipt_note_detail', 'admin\GoodsReceiptNotesDetailController')
        ->middleware('goodsreceiptnote');
    Route::get('goods_receipt', 'admin\GoodsReceiptNotesController@showMaterialNeededGoods')
        ->name('admin.material')
        ->middleware('goodsreceiptnote');
    Route::resource('goods_receipt_note_restore', 'admin\restore\GoodsReceiptNotesRestoreController', ['only' => ['index', 'store']])
        ->middleware('goodsreceiptnote');
    Route::post('goods_receipt_note_delete', 'admin\restore\GoodsReceiptNotesRestoreController@delete')->name('goods_receipt_note_delete')
        ->middleware('goodsreceiptnote');
    Route::get('goods_receipt_note_get_unit', 'admin\GoodsReceiptNotesDetailController@getUnit')->name('goods.get.unit')
        ->middleware('goodsreceiptnote');

    /**      orders       **/
    Route::resource('orders', 'admin\OrderController')
        ->middleware('order');
    Route::get('order_approved/{id}', 'admin\OrderController@orderApproved')->name('order_approved')
        ->middleware('order');
    Route::get('order_cancelled/{id}', 'admin\OrderController@orderCancelled')->name('order_cancelled')
        ->middleware('order');
    Route::get('orders/filter/show', 'admin\OrderController@filter')->name('orders_filter')
        ->middleware('order');
    Route::get('orders/{id}/print', 'admin\OrderController@printOrder')->name('print_order')
        ->middleware('order');
    Route::get('order_search', 'admin\OrderController@search')->name('order_search')
        ->middleware('order');
    Route::resource('order_restore', 'admin\restore\OrderRestoreController', ['only' => ['index', 'store']])
        ->middleware('order');
    Route::post('order_delete', 'admin\restore\OrderRestoreController@delete')->name('order_delete')
        ->middleware('order');

    /**      Sales offs       **/
    Route::resource('sales_offs', 'admin\SalesOffsController', ["except" => ["create", "edit"]])
        ->middleware('salesoff');
    Route::get('create_sales_offs/{id}', 'admin\SalesOffsController@movePageCreateSales')->name('admin.createSales')
        ->middleware('salesoff');
    Route::resource('create_sales', 'admin\CreateSalesController', ["except" => ["create", "show", "edit"]])
        ->middleware('salesoff');
    Route::resource('sales_offs_details', 'admin\SalesOffsDetailsController')
        ->middleware('salesoff');



    /**      Content       **/
    Route::resource('content/shop_infos', 'admin\ShopInfoController')
        ->middleware('content');

    Route::resource('content/news', 'admin\NewsController')
        ->middleware('content');

    Route::resource('content/sliders', 'admin\SliderController')
        ->middleware('content');



    /**      Employee       **/

    Route::resource('employees', 'admin\EmployeeController')
        ->middleware('employee');
    Route::post('employees/reset_pass/{id}', 'admin\EmployeeController@resetPass')->name('reset_pass')
        ->middleware('employee');
    Route::post('employees/change_pass/{id}', 'admin\EmployeeController@changePass')->name('change_pass')
        ->middleware('employee');
    Route::post('employees/change_info/{id}', 'admin\EmployeeController@changeInfo')->name('change_info')
        ->middleware('employee');
    Route::post('employees/add_role', 'admin\EmployeeController@addRole')->name('employee.add.role')
        ->middleware('employee');
    Route::resource('employee_restore', 'admin\restore\EmployeeRestoreController', ['only' => ['index', 'store']])
        ->middleware('employee');
    Route::post('employee_delete', 'admin\restore\EmployeeRestoreController@delete')->name('employee_delete')
        ->middleware('employee');
    /** Comments **/

    Route::resource('comments', 'admin\CommentController');
    Route::post('comments/{id}', 'admin\CommentController@update')->name('admin.approved');
    Route::get('comments/filter/{id}', 'admin\CommentController@filter')->name('admin_comment_filter');

    /** transport fees **/

    Route::resource('transport_fees','admin\TransportFeesController');
    Route::post('storedistrict','admin\TransportFeesController@storeDistrict')->name('district.store');
    Route::post('updatedistrict/{$id}','admin\TransportFeesController@updateDistrict')->name('district.update');

});


/**      Customer       **/

    // Test sms api
    Route::get('/testlocation', 'Customer\TestController@testLocation')->name('test.location');

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
    Route::get('/payment/process_payment', 'Customer\PaymentController@processPayment')->name('payment.process');
    Route::get('/payment/success', 'Customer\PaymentController@successPayment')->name('payment.success');
    Route::get('/payment/cancel', 'Customer\PaymentController@cancelPayment')->name('payment.cancel');

    // Foody
    Route::get('/foody/{slug}', 'Customer\FoodyController@index')->name('customer.foody.show');
    Route::get('/customer/search', 'Customer\FoodyController@search');
    Route::post('/customer/foody/comment', 'Customer\FoodyController@comment');
    Route::post('/customer/like', 'Customer\FoodyController@like');
    Route::post('/customer/favorite', 'Customer\FoodyController@favorite');
    Route::post('/customer/rating', 'Customer\FoodyController@rating')->name('customer.foody.rating');
    Route::get('customer/foody/comment/delete', 'Customer\FoodyController@deleteComment')->name('customer.foody.comment.delete');
    Route::post('customer/foody/comment/mini', 'Customer\FoodyController@miniComment')->name('customer.foody.comment.mini');

    // Order
    Route::get('/payment/order', 'Customer\OrderController@index')->name('payment.order.index');
    Route::get('/payment/order/get', 'Customer\OrderController@getOrder');
    Route::get('/payment/order/show/{order_code}', 'Customer\OrderController@showOrder')->name('payment.order.show');
    Route::post('/payment/order/remove', 'Customer\OrderController@removeOrder');
    Route::get('/payment/order/get_otp', 'Customer\OrderController@getOTP')->name('payment.order.get_otp');
    Route::post('/payment/order/check_otp', 'Customer\OrderController@checkOTP')->name('payment.order.check_otp');

    // News
    Route::get('/news', 'Customer\NewsController@index')->name('customer.news.index');
    Route::get('/news/{slug}', 'Customer\NewsController@show')->name('customer.news.show');

    // Login & logout
    Route::post('/customer/login', 'Customer\CustomerLoginController@login');
    Route::get('logout/', 'Customer\CustomerLoginController@logout')->name('customer.logout');
    Route::get('/customer/register', 'Customer\CustomerController@showRegister')->name('customer.register.show');
    Route::post('/customer/register/submit',
        'Customer\CustomerController@register')->name('customer.register.submit');
    Route::get('/customer/register/get_otp', 'Customer\CustomerController@getOTP')->name('customer.register.get_otp');
    Route::post('/customer/register/check_otp', 'Customer\CustomerController@checkOTP')->name('customer.register.check_otp');
    Route::post('/customer/profile/change', 'Customer\CustomerController@changeProfile')->name('customer.profile.change');

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
    Route::resource('product_type','Admin\ProductTypeController',["except" => ["create", "show", "edit"]]);
    Route::get('product_type/{id}','Admin\ProductTypeController@changeStatus')->name('admin.changeStatus');


});

/**      Customer       **/


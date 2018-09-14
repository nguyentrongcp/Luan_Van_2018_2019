<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create_type something great!
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

    Route::resource('loai_thuc_don','Admin\ProductTypeController',["except" => ["create","show", "edit"]]);
    Route::get('them_loai_thuc_don/{id}','Admin\ProductTypeController@movePageCreateType')
            ->name('admin.addType');
    Route::resource('them_moi','Admin\AddTypeController',["except" => ["create","show", "edit"]]);
    Route::get('loai_thuc_don/{id}','Admin\ProductTypeController@changeStatus')
        ->name('loai_thuc_don.changeStatus');

    /** Product */

    Route::resource('thuc_don','Admin\ProductController');

});

/**      Customer       **/


<?php


//Route::get('/d',function(){
//    return bcrypt('bappa@123');
//});
Route::controller('auth', 'AuthController');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@get_home');
    Route::controller('ajax', 'AjaxController');
    Route::controller('settings', 'SettingsController');
    Route::controller('sell', 'SellController');
    Route::controller('purchase', 'PurchaseController');
    Route::controller('refund', 'RefundController');

    Route::get('report','ReportController@index');

    Route::get('payment','PaymentController@index');
    Route::get('payment/create','PaymentController@create');
    Route::post('payment/store','PaymentController@store');
    Route::get('payment/edit/{id}','PaymentController@edit');
    Route::post('payment/update/{id}','PaymentController@update');
    Route::get('payment/delete/{id}','PaymentController@delete');

    Route::get('product','ProductController@index');
    Route::get('product/create','ProductController@create');
    Route::post('product/store','ProductController@store');
    Route::get('product/edit/{id}','ProductController@edit');
    Route::post('product/update/{id}','ProductController@update');
    Route::get('product/delete/{id}','ProductController@delete');

    Route::get('stock','StockController@index');
    Route::get('stock/create','StockController@create');
    Route::post('stock/store','StockController@store');
    Route::get('stock/edit/{id}','StockController@edit');
    Route::post('stock/update/{id}','StockController@update');
    Route::get('stock/delete/{id}','StockController@delete');

    Route::get('customer','CustomerController@index');
    Route::get('customer/create','CustomerController@create');
    Route::post('customer/store','CustomerController@store');
    Route::get('customer/edit/{id}','CustomerController@edit');
    Route::post('customer/update/{id}','CustomerController@update');
    Route::get('customer/delete/{id}','CustomerController@delete');

    Route::get('category','CategoryController@index');
    Route::get('category/create','CategoryController@create');
    Route::post('category/store','CategoryController@store');
    Route::get('category/edit/{id}','CategoryController@edit');
    Route::post('category/update/{id}','CategoryController@update');
    Route::get('category/delete/{id}','CategoryController@delete');

    Route::get('brand','BrandController@index');
    Route::get('brand/create','BrandController@create');
    Route::post('brand/store','BrandController@store');
    Route::get('brand/edit/{id}','BrandController@edit');
    Route::post('brand/update/{id}','BrandController@update');
    Route::get('brand/delete/{id}','BrandController@delete');

    Route::get('discount','DiscountController@index');
    Route::get('discount/create','DiscountController@create');
    Route::post('discount/store','DiscountController@store');
    Route::get('discount/edit/{id}','DiscountController@edit');
    Route::post('discount/update/{id}','DiscountController@update');
    Route::get('discount/delete/{id}','DiscountController@delete');

    Route::get('user','UserController@index');
    Route::get('user/create','UserController@create');
    Route::post('user/store','UserController@store');
    Route::get('user/edit/{id}','UserController@edit');
    Route::post('user/update/{id}','UserController@update');
    Route::get('user/delete/{id}','UserController@delete');

    Route::get('role','RoleController@index');
    Route::get('role/create','RoleController@create');
    Route::post('role/store','RoleController@store');
    Route::get('role/edit/{id}','RoleController@edit');
    Route::post('role/update/{id}','RoleController@update');
    Route::get('role/delete/{id}','RoleController@delete');

    Route::get('permission','PermissionController@index');
    Route::get('permission/create','PermissionController@create');
    Route::post('permission/store','PermissionController@store');
    Route::get('permission/edit/{id}','PermissionController@edit');
    Route::post('permission/update/{id}','PermissionController@update');
    Route::get('permission/delete/{id}','PermissionController@delete');

});

/*
 * Custom Route
 */
Route::get('sells-history', 'SellController@history');
Route::get('purchase-history', 'PurchaseController@history');

//get('pass', function () {
//    return bcrypt('112233');
//});

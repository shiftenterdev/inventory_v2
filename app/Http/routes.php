<?php


//Route::get('/d',function(){
//    return bcrypt('bappa@123');
//});
Route::controller('auth', 'AuthController');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@get_home');
    Route::controller('product', 'ProductController');
    Route::controller('discount', 'DiscountController');
    Route::controller('ajax', 'AjaxController');
    Route::controller('settings', 'SettingsController');
    Route::controller('category', 'CategoryController');
    Route::controller('customer', 'CustomerController');
    Route::controller('brand', 'BrandController');
    Route::controller('stock', 'StockController');
    Route::controller('sell', 'SellController');
    Route::controller('purchase', 'PurchaseController');
    Route::controller('refund', 'RefundController');
    Route::controller('payment', 'PaymentController');

    Route::get('report','ReportController@index');
//    Route::get('user/create','UserController@create');
//    Route::post('user/store','UserController@store');
//    Route::get('user/edit/{id}','UserController@edit');
//    Route::post('user/update/{id}','UserController@update');
//    Route::get('user/delete/{id}','UserController@delete');

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

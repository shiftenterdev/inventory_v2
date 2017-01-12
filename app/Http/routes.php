<?php

Route::get('/', 'AdminController@get_home');
Route::get('/d',function(){
    return bcrypt('bappa@123');
});
Route::controller('auth', 'AuthController');
Route::group(['middleware' => 'auth'], function () {

    Route::controller('product', 'ProductController');
    Route::controller('discount', 'DiscountController');
    Route::controller('ajax', 'AjaxController');
    Route::controller('settings', 'SettingsController');
    Route::controller('category', 'CategoryController');
    Route::controller('customer', 'CustomerController');
    Route::controller('brand', 'BrandController');
    Route::controller('stock', 'StockController');
    Route::controller('user', 'UserController');
    Route::controller('sell', 'SellController');
    Route::controller('purchase', 'PurchaseController');
    Route::controller('refund', 'RefundController');
    Route::controller('payment', 'PaymentController');
    Route::controller('role', 'RoleController');

});

/*
 * Custom Route
 */
Route::get('sells-history', 'SellController@history');
Route::get('purchase-history', 'PurchaseController@history');

get('pass', function () {
    return bcrypt('112233');
});

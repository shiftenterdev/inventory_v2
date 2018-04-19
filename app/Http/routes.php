<?php


//Route::get('/d',function(){
//    return bcrypt('bappa@123');
//});
Route::controller('auth', 'AuthController');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@get_home');
    Route::controller('ajax', 'AjaxController');
    Route::controller('refund', 'RefundController');

    Route::get('sell','SellController@index');
    Route::get('sell/show/{invoice}','SellController@show');
    Route::get('sell/products','SellController@products');
    Route::get('sell/invoice','SellController@invoice');
    Route::post('sell/store','SellController@store');
    Route::get('sell/history','SellController@history');
    Route::post('sell/update','SellController@update');

    Route::get('purchase', 'PurchaseController@index');
    Route::get('purchase/show/{invoice}','PurchaseController@show');
    Route::get('purchase/products','PurchaseController@products');
    Route::get('purchase/invoice','PurchaseController@invoice');
    Route::post('purchase/store','PurchaseController@store');
    Route::get('purchase/history','PurchaseController@history');
    Route::post('purchase/update','PurchaseController@update');

    Route::get('report','ReportController@index');

    Route::get('settings','SettingsController@index');
    Route::post('settings/password','SettingsController@password');
    Route::post('settings/store','SettingsController@store');

    Route::get('payment','PaymentController@index');
    Route::get('payment/create','PaymentController@create');
    Route::post('payment/store','PaymentController@store');
    Route::get('payment/edit/{id}','PaymentController@edit');
    Route::post('payment/update/{id}','PaymentController@update');
    Route::get('payment/delete/{id}','PaymentController@delete');

    Route::get('employee','EmployeeController@index');
    Route::get('employee/create','EmployeeController@create');
    Route::post('employee/store','EmployeeController@store');
    Route::get('employee/edit/{id}','EmployeeController@edit');
    Route::post('employee/update/{id}','EmployeeController@update');
    Route::get('employee/delete/{id}','EmployeeController@delete');

    Route::get('table','TableController@index');
    Route::get('table/create','TableController@create');
    Route::post('table/store','TableController@store');
    Route::get('table/edit/{id}','TableController@edit');
    Route::post('table/update/{id}','TableController@update');
    Route::get('table/delete/{id}','TableController@delete');

    Route::get('food','FoodController@index');
    Route::get('food/create','FoodController@create');
    Route::post('food/store','FoodController@store');
    Route::get('food/edit/{id}','FoodController@edit');
    Route::post('food/update/{id}','FoodController@update');
    Route::get('food/delete/{id}','FoodController@delete');

    Route::get('food/category','FoodCategoryController@index');
    Route::get('food/category/create','FoodCategoryController@create');
    Route::post('food/category/store','FoodCategoryController@store');
    Route::get('food/category/edit/{id}','FoodCategoryController@edit');
    Route::post('food/category/update/{id}','FoodCategoryController@update');
    Route::get('food/category/delete/{id}','FoodCategoryController@delete');

    Route::get('product','ProductController@index');
    Route::post('product/search','ProductController@search');
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
    Route::post('customer/search','CustomerController@search');
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

//get('pass', function () {
//    return bcrypt('112233');
//});

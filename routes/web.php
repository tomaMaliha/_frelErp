<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/user_order/{id}' , 'HomeController@user_order')->name('user.order');
// Route::get('/user/logout', 'Auth\LoginController@finish')->name('user.finish');

Route::group(['prefix'=>'admin'], function()
{
    Route::get('/' , 'AdminController@index')->name('admin.home');
    Route::post('/recentOrder' , 'AdminController@search')->name('recent.order');

	Route::get('/login' , 'Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login' , 'Admin\LoginController@login')->name('admin.login.submit');
	Route::get('/logout' , 'Admin\LoginController@logout')->name('logout');

	Route::get('/password/reset' , 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/email' , 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset/{token}' , 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset' , 'Admin\ResetPasswordController@reset');

    //User Management
    Route::get('/userList' , 'UserController@list')->name('user.list');
    Route::get('/userAdd' , 'UserController@userAdd')->name('user.add');
    Route::post('/user/create' , 'UserController@create')->name('user.create');
    Route::get('/user/edit/{id}' , 'UserController@edit')->name('user.edit');
    Route::post('/user/Update/{id}' , 'UserController@update')->name('user.update');
    Route::get('/user/delete/{id}' , 'UserController@delete')->name('user.delete');
    Route::post('/user/active/{id}' , 'UserController@UserActive')->name('user.active');
    Route::post('/user_password/{id}' , 'UserController@user_password')->name('user.password');
    Route::post('/division/active/{id}' , 'UserController@divisionActive')->name('division.active');
    Route::get('division/manage' , 'UserController@division')->name('user.division');
    Route::get('zone/manage' , 'UserController@zone')->name('user.zone');
    Route::post('/zone/active/{id}' , 'UserController@zoneActive')->name('zone.active');
    Route::get('base/manage' , 'UserController@base')->name('user.base');
    Route::post('/base/active/{id}' , 'UserController@baseActive')->name('base.active');

    //role Manage
    Route::get('/role/view' , 'RoleController@index')->name('role');
    Route::get('/role/add' , 'RoleController@userAdd')->name('role.add');
    Route::post('/role/create' , 'RoleController@create')->name('role.create');
    Route::get('/role/view/{id}' , 'RoleController@view')->name('role.view');
    Route::post('/role/update/{id}' , 'RoleController@update')->name('role.update');
    Route::get('/role/delete/{id}' , 'RoleController@delete')->name('role.delete');
    Route::post('/role/active/{id}' , 'RoleController@roleActive')->name('role.active');

    //Permission of roles
    Route::get('/permission' , 'PermissionController@index')->name('permission.list');
    Route::get('/permission/create' , 'PermissionController@create')->name('permission.create');
    Route::get('/permission/store' , 'PermissionController@store')->name('permission.store');

    //Category
    Route::get('/category/list' , 'CategoryController@index')->name('category.list');
    Route::post('/category/create' , 'CategoryController@create')->name('category.create');
    Route::post('/category/update/{id}' , 'CategoryController@update')->name('category.update');
    // Route::get('/category/delete/{id}' , 'CategoryController@delete')->name('category.delete');
    Route::post('/category/active/{id}' , 'CategoryController@categoryActive')->name('active');
    Route::post('/category/search', 'CategoryController@search')->name('category.product');
    Route::get('/category/categorySinglePrint/{id}' , 'CategoryController@categorySinglePrint')->name('category.single.print');


    //Distributor Information
    Route::get('/distributorList' , 'DistributorController@list')->name('distributor.list');
    Route::get('/distributor/add' , 'DistributorController@add')->name('distributor.add');
    Route::post('/distributor/create' , 'DistributorController@create')->name('distributor.create');
    Route::get('/distributor/edit/{id}' , 'DistributorController@edit')->name('distributor.edit');
    Route::post('/distributor/Update/{id}' , 'DistributorController@update')->name('distributor.update');
    // Route::get('/distributor/delete/{id}' , 'DistributorController@delete')->name('distributor.delete');
    Route::get('/distributorPending','DistributorController@distributorPending')->name('distributor.pending');
    Route::get('/distributorApprove/{id}','DistributorController@distributorApprove')->name('distributor.approve');
    Route::post('get/district/list', 'DistributorController@getDistrict')->name('distributor.district');
    Route::post('get/upazila/list', 'DistributorController@getUpazila')->name('distributor.upazila');
    Route::get('/distributor/moreInfo/{id}' , 'DistributorController@moreInfo')->name('distributor.moreInfo');
    Route::post('/distributor/moreInfoAdd/{id}' , 'DistributorController@moreInfoAdd')->name('distributor.moreInfoAdd');
    Route::get('/distributorReportOrder/delete/{id}' , 'DistributorController@OrderReportdelete')->name('distributor.orderReport.delete');
    Route::get('/distributor/dsitributorSinglePrint/{id}' , 'DistributorController@distributorSinglePrint')->name('distributor.single.print');
    Route::get('/distributor/detailsInformation/{id}' , 'DistributorController@distributorDetailsInformation')->name('distributor.details');
    Route::get('/distributor/details/proprietor/{id}' , 'DistributorController@distributorDetailsProprietor')->name('distributor.proprietor');
    Route::get('/distributor/details/document/{id}' , 'DistributorController@distributorDetailsDocument')->name('distributor.document');
    Route::get('distributor/division' , 'DistributorBalance@division')->name('division');
    Route::get('distributor/policy' , 'DistributorController@policy')->name('distributor.policy.print');
    

    //product
    Route::get('/product/list' , 'ProductController@productList')->name('product.list');
    Route::get('/product/add' , 'ProductController@productAdd')->name('product.add');
    Route::post('/product/create' , 'ProductController@create')->name('product.create');
    Route::get('/product/edit/{id}' , 'ProductController@edit')->name('product.edit');
    Route::post('/product/update/{id}' , 'ProductController@update')->name('product.update');
    Route::get('/product_details/{id}' , 'ProductController@product_details')->name('product.details');
    // Route::get('/product/delete/{id}' , 'ProductController@delete')->name('product.delete');
    // Route::get('/productOutOfStock','ProductController@productOutOfStock')->name('product.outStock');
    // Route::get('/productOutOfStock/{id}','ProductController@productInactive')->name('product.inactive');
    Route::post('/productActive/{id}','ProductController@productActive')->name('product.active');
    Route::post('/product/search','ProductController@productSearch')->name('product.search');


    //Brand
    Route::get('/brand/list' , 'BrandController@brandList')->name('brand.list');
    Route::post('/brand/create' , 'BrandController@create')->name('brand.create');
    Route::post('/brand/update/{id}' , 'BrandController@update')->name('brand.update');
    Route::get('/brand/brandSinglePrint/{id}' , 'BrandController@brandSinglePrint')->name('brand.single.print');
    Route::post('/brand_status/{id}' , 'BrandController@status')->name('brand.status');
    Route::post('/brand_delete/{id}' , 'BrandController@delete')->name('brand.delete');

    //Stock
    Route::get('/stock/list','StockController@list')->name('stock.list');
    Route::get('/stock/add' , 'StockController@stockAdd')->name('stock.add');
    Route::post('/stock/create' , 'StockController@create')->name('stock.create');
    Route::post('/stock/Update/{id}' , 'StockController@update')->name('stock.update');
    Route::get('/stock/delete/{id}' , 'StockController@delete')->name('stock.delete');
    Route::post('/stock/search', 'StockController@searchStock')->name('search.stock');
    Route::post('/stock/Update' , 'StockController@stockUpdate')->name('stock-update');
    Route::post('/stock/report/search' , 'StockController@stockReportSearch')->name('stock.report.search');

    //Payment
    
    Route::get('/payment/add', 'PaymentController@add')->name('payment.add');
    Route::post('/payment/create' , 'PaymentController@create')->name('payment.create');
    Route::get('/payment/edit/{id}' , 'PaymentController@edit')->name('payment.edit');
    Route::post('/payment/update/{id}' , 'PaymentController@update')->name('payment.update');
    Route::get('/payment/details' , 'PaymentController@paymentDetails')->name('payment.details');
    Route::post('/payment/search' , 'PaymentController@productDetailsSearch')->name('payment.search');
    Route::get('/payment/customerStatement' , 'PaymentController@customerStatement')->name('customerStatement');
    Route::post('/payment/searchCustomer' , 'PaymentController@searchCustomer')->name('search.customer');
    Route::post('/payment/customer/information' , 'PaymentController@customerPaymentInfo')->name('customer.payment.info');
    Route::get('/payment/backDate/add', 'PaymentController@addBackDate')->name('payment.add.backDate');
    Route::post('/payment/backDate/create' , 'PaymentController@createBackDate')->name('payment.create.backDate');
    Route::post('/distributorComssionBalance' , 'PaymentController@distributorCommisionBalance')->name('distributor.commission.balance');

    //Transaction History
    Route::get('/transaction' , 'PaymentController@transaction_show')->name('transaction.show');
    Route::get('/transaction_details/{id}' , 'PaymentController@transaction_details')->name('transaction.details');

    //Bank
    Route::get('/bank/list' , 'BankController@list')->name('bank.list');
    Route::post('/bank/create' , 'BankController@create')->name('bank.create');
    Route::post('/bank/update/{id}' , 'BankController@update')->name('bank.update');
    Route::post('/bank/active/{id}' , 'BankController@bankActive')->name('bank.active');


    //Order
    Route::get('/order/list' , 'OrderController@list')->name('order.list');
    Route::post('/order/find/' , 'OrderController@searchDetails')->name('order.search');
    Route::get('/order/{distributor_id}' , 'OrderController@order')->name('order');
    Route::post('/order/category/{distributor_id}' , 'OrderController@searchCategory')->name('order.category');
    Route::post('/order/create/{distributor_id}' , 'OrderController@create')->name('order.create');
    Route::post('/order_update/{distributor_id}' , 'OrderController@update')->name('order.update');
    Route::get('/order/delete/{id}' , 'OrderController@delete')->name('order.delete');
    Route::post('/order/place' , 'OrderController@placeOrder')->name('order.place');
    Route::get('/order/balanceHistory/create' , 'OrderDuplicateController@balanceHistory')->name('order.balanceHistory');
    Route::get('/orderDetails/{id}' , 'OrderDuplicateController@orderDetails')->name('orderDetails');
    Route::get('/orderDetails/Active/{id}' , 'OrderDuplicateController@orderDetailsActive')->name('orderDetails.active');

    //cart
    Route::get('/cart/view/{distributor_id}' , 'OrderController@cartView')->name('cart.view');
    Route::get('/pending/order' , 'OrderDuplicateController@pendingOrder')->name('pending.order');
    Route::get('/pending/order/{id}' , 'OrderDuplicateController@orderApprove')->name('approve.order');
    Route::get('/allOrder/list' , 'OrderDuplicateController@allOrder')->name('allOrder.list');
    Route::post('/allOrder/search' , 'OrderDuplicateController@allOrderSearch')->name('allOrder.search');

    Route::get('/product' , 'OrderDuplicateController@order')->name('order.productNew');

    // Report
    Route::get('/db/stock/report' , 'DistributorController@dbStockReport')->name('db.stock.report');
    Route::post('/db/stock/report/search' , 'DistributorController@dbStockReportSearch')->name('db.stock.report.search');
    Route::post('/db/stock/report/update/{id}' , 'DistributorController@dbStockReportUpdate')->name('db.stock.report.update');

    //Delivery
    Route::get('/deliveryForm' , 'DeliveryController@add')->name('delivery.add');
    Route::post('/deliveryForm/search' , 'DeliveryController@search')->name('delivery.search');
    Route::post('/delivery/create' , 'DeliveryController@create')->name('delivery.create');
    Route::get('/delivery/list' , 'DeliveryController@list')->name('delivery.list');
    Route::get('/delivery/DO/{id}' , 'DeliveryController@DO')->name('delivery.DO');
    Route::post('/delivery/DOCreate/{id}' , 'DeliveryController@DOCreate')->name('delivery.DOCreate');
    Route::post('/deliveryStatus/{id}' , 'DeliveryController@deliveryStatus')->name('delivery.status');
    Route::get('/delivery/ChalanPrint/{id}' , 'DeliveryController@deliveryChalanPrint')->name('delivery.Chalan.Print');
    Route::get('/deliveryChalanSingle/{id}' , 'DeliveryController@deliveryChalanSingle')->name('delivery.single');
    Route::get('/delivery/orderDetails/{id}' , 'DeliveryController@deliveryOrderDetails')->name('delivery.order');
    
    //driver information
    Route::get('/driver/list' , 'DeliveryController@driverList')->name('driver.list');
    Route::post('/driver/create' , 'DeliveryController@driverCreate')->name('driver.create');
    Route::post('/driver/update/{id}' , 'DeliveryController@driverUpdate')->name('driver.update');
    Route::post('/driver/updateStatus/{id}' , 'DeliveryController@updateStatus')->name('driver.updateStatus');


});

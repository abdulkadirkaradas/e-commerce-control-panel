<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
});

Route::group(["prefix" => "v1", "as" => "api.", "namespace" => "Api\V1\Mobile", "middleware" => ["mobile:mobileapi"]], function () {

    // Test Login
    Route::post("test-login", "LoginApiController@testLogin");

    // Login
    Route::post("login", "LoginApiController@login");

    // Check IF Exist Email
    Route::post("check-if-exist-email", "UserApiController@checkIfExistEmail");

    // Change Password - To be improved
    Route::post("change-password", "UserApiController@changePassword");

    // Create New Customer
    Route::post("new-customer", "CustomerApiController@newCustomer");

    // Create Customer Address
    Route::post("create-customer-address", "CustomerApiController@createCustomerAddress");

    // Get All Products
    Route::post("get-all-products", "ProductsApiController@getAllProducts");

    // Get Orders
    // Route::post("get-customer-orders", "OrdersApiController@getCustomerOrders");

});

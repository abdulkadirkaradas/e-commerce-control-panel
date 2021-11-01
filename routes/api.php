<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
});

Route::group(["prefix" => "v1", "as" => "api.", "namespace" => "Api\V1\Mobile", "middleware" => ["mobile:mobileapi"]], function () {

    // Login
    Route::post("login", "LoginApiController@login");

    // Check IF Exist Email
    Route::post("check-if-exist-email", "CustomerApiController@checkIfExistEmail");

    // Create New Customer
    Route::post("new-customer", "CustomerApiController@newCustomer");

    // Create Customer Address
    Route::post("create-customer-address", "CustomerApiController@createCustomerAddress");

});

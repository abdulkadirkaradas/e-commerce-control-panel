<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Customers
    Route::delete('customers/destroy', 'CustomersController@massDestroy')->name('customers.massDestroy');
    Route::resource('customers', 'CustomersController');

    // Customer Orders
    Route::delete('customer-orders/destroy', 'CustomerOrdersController@massDestroy')->name('customer-orders.massDestroy');
    Route::resource('customer-orders', 'CustomerOrdersController');

    // Customer Reviews
    Route::delete('customer-reviews/destroy', 'CustomerReviewsController@massDestroy')->name('customer-reviews.massDestroy');
    Route::resource('customer-reviews', 'CustomerReviewsController');

    // Customer Favorites
    Route::delete('customer-favorites/destroy', 'CustomerFavoritesController@massDestroy')->name('customer-favorites.massDestroy');
    Route::resource('customer-favorites', 'CustomerFavoritesController');

    // Products
    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');
    Route::resource('products', 'ProductsController');

    // Product Categories
    Route::delete('product-categories/destroy', 'ProductCategoriesController@massDestroy')->name('product-categories.massDestroy');
    Route::resource('product-categories', 'ProductCategoriesController');

    // Customer Address
    Route::delete('customer-addresses/destroy', 'CustomerAddressController@massDestroy')->name('customer-addresses.massDestroy');
    Route::resource('customer-addresses', 'CustomerAddressController');

    // Orders
    Route::delete('orders/destroy', 'OrdersController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrdersController');

    // Sale Situations
    Route::delete('sale-situations/destroy', 'SaleSituationsController@massDestroy')->name('sale-situations.massDestroy');
    Route::resource('sale-situations', 'SaleSituationsController');

    // Shopping Cart
    Route::delete('shopping-carts/destroy', 'ShoppingCartController@massDestroy')->name('shopping-carts.massDestroy');
    Route::resource('shopping-carts', 'ShoppingCartController');

    // Product Statuses
    Route::delete('product-statuses/destroy', 'ProductStatusesController@massDestroy')->name('product-statuses.massDestroy');
    Route::resource('product-statuses', 'ProductStatusesController');

    // Product Details
    Route::delete('product-details/destroy', 'ProductDetailsController@massDestroy')->name('product-details.massDestroy');
    Route::resource('product-details', 'ProductDetailsController');

    // Reviews
    Route::delete('reviews/destroy', 'ReviewsController@massDestroy')->name('reviews.massDestroy');
    Route::resource('reviews', 'ReviewsController');

    // Review Attachments
    Route::delete('review-attachments/destroy', 'ReviewAttachmentsController@massDestroy')->name('review-attachments.massDestroy');
    Route::post('review-attachments/media', 'ReviewAttachmentsController@storeMedia')->name('review-attachments.storeMedia');
    Route::post('review-attachments/ckmedia', 'ReviewAttachmentsController@storeCKEditorImages')->name('review-attachments.storeCKEditorImages');
    Route::resource('review-attachments', 'ReviewAttachmentsController');

    // Favorites
    Route::delete('favorites/destroy', 'FavoritesController@massDestroy')->name('favorites.massDestroy');
    Route::resource('favorites', 'FavoritesController');

    // Banner
    Route::delete('banners/destroy', 'BannerController@massDestroy')->name('banners.massDestroy');
    Route::post('banners/media', 'BannerController@storeMedia')->name('banners.storeMedia');
    Route::post('banners/ckmedia', 'BannerController@storeCKEditorImages')->name('banners.storeCKEditorImages');
    Route::resource('banners', 'BannerController');

    // Videos
    Route::delete('videos/destroy', 'VideosController@massDestroy')->name('videos.massDestroy');
    Route::post('videos/media', 'VideosController@storeMedia')->name('videos.storeMedia');
    Route::post('videos/ckmedia', 'VideosController@storeCKEditorImages')->name('videos.storeCKEditorImages');
    Route::resource('videos', 'VideosController');

    // Video Types
    Route::delete('video-types/destroy', 'VideoTypesController@massDestroy')->name('video-types.massDestroy');
    Route::resource('video-types', 'VideoTypesController');

    // Faq Categories
    Route::delete('faq-categories/destroy', 'FaqCategoriesController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoriesController');

    // Faq
    Route::delete('faqs/destroy', 'FaqController@massDestroy')->name('faqs.massDestroy');
    Route::resource('faqs', 'FaqController');

    // Campaigns
    Route::delete('campaigns/destroy', 'CampaignsController@massDestroy')->name('campaigns.massDestroy');
    Route::resource('campaigns', 'CampaignsController');

    // Static Contents
    Route::delete('static-contents/destroy', 'StaticContentsController@massDestroy')->name('static-contents.massDestroy');
    Route::post('static-contents/media', 'StaticContentsController@storeMedia')->name('static-contents.storeMedia');
    Route::post('static-contents/ckmedia', 'StaticContentsController@storeCKEditorImages')->name('static-contents.storeCKEditorImages');
    Route::resource('static-contents', 'StaticContentsController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

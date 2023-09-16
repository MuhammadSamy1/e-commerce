<?php


use App\Http\Controllers\Customer\Address\CustomerAddressController;
use App\Http\Controllers\Customer\Cart\ShowOrderController;
use App\Http\Controllers\Customer\Payment\PaymentController;
use App\Http\Controllers\Customer\Payment\StripeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function() {
            Route::resource('/showcart', ShowOrderController::class);
            Route::resource('/customer_address',CustomerAddressController::class);
            Route::resource('/payment',PaymentController::class);
            Route::resource('stripe',StripeController::class);
});

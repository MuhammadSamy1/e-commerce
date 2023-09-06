<?php


use App\Http\Controllers\Customer\Address\CustomerAddressController;
use App\Http\Controllers\Customer\Cart\ShowOrderController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function() {
            Route::resource('/showcart', ShowOrderController::class);
            Route::resource('/customer_address',CustomerAddressController::class);
});

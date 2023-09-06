<?php


use App\Http\Controllers\Address\CityController;
use App\Http\Controllers\Address\CountryController;
use App\Http\Controllers\Address\StateController;
use App\Http\Controllers\Cart\OrderController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\ProductCustomerController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::resource('/customer',CustomerController::class);
        Route::resource('/category',CategoryController::class);
        Route::resource('/product',ProductController::class);
        Route::resource('/create/cart',ProductCustomerController::class)->name('show','cart');
        Route::resource('/orders',OrderController::class);
        Route::resource('/countries',CountryController::class);
        Route::resource('/states',StateController::class);
        Route::resource('/cities',CityController::class);
});

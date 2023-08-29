<?php


use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Customer\CustomerController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::resource('/customer',CustomerController::class);
        Route::resource('/category',CategoryController::class);
});

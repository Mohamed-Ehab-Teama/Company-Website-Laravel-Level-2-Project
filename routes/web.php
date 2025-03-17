<?php

use App\Http\Controllers\FeatureController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


// Fornt Routes
Route::name('front.')->group(function () {
    Route::view('/', 'front.index')->name('index');
    Route::view('/about', 'front.about')->name('about');
    Route::view('/contact', 'front.contact')->name('contact');
    Route::view('/services', 'front.services')->name('services');
});


// Dashboard Routes
Route::name('admin.')->prefix(LaravelLocalization::setLocale() . '/admin')
    ->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
    ->group(function () {

        Route::middleware('auth')->group(function () {
            // ==========================   Home Page
            Route::view('/', 'admin.index')->name('index');

            // ==========================   Services Module
            Route::controller(ServiceController::class)->group(function() {
                Route::resource('services',ServiceController::class);
            });
            
            // ==========================   Features Module
            Route::controller(FeatureController::class)->group(function() {
                Route::resource('features',FeatureController::class);
            });
            
            // ==========================   Features Module
            Route::controller(MessageController::class)->group(function() {
                Route::resource('messages',MessageController::class)->only(['index','show','destroy']);
            });
        });

        require __DIR__ . '/auth.php';
    });


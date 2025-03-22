<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
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
            Route::controller(ServiceController::class)->group(function () {
                Route::resource('services', ServiceController::class);
            });

            // ==========================   Features Module
            Route::controller(FeatureController::class)->group(function () {
                Route::resource('features', FeatureController::class);
            });

            // ==========================   Messages Module
            Route::controller(MessageController::class)->group(function () {
                Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
            });

            // ==========================   Subscribers Module
            Route::controller(SubscriberController::class)->group(function () {
                Route::resource('subscribers', SubscriberController::class)->only(['index', 'destroy']);
            });

            // ==========================   Testimonials Module
            Route::controller(TestimonialController::class)->group(function () {
                Route::resource('testimonials', TestimonialController::class);
            });

            // ==========================   Companies Module
            Route::controller(CompanyController::class)->group(function () {
                Route::resource('companies', CompanyController::class);
            });

            // ==========================   members Module
            Route::controller(MemberController::class)->group(function () {
                Route::resource('members', MemberController::class);
            });

            // ==========================   settings Module
            Route::controller(SettingController::class)->group(function () {
                Route::resource('settings', SettingController::class)->only(['index', 'update']);
            });
        });

        require __DIR__ . '/auth.php';
    });

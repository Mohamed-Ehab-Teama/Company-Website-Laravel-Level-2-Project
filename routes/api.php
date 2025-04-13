<?php

use App\Http\Controllers\API\FeatureController;
use App\Http\Controllers\API\MessageController;
use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\API\StoreServiceController;
use App\Http\Controllers\API\SubscriberController;
use App\Http\Controllers\API\TestimonialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Services API
Route::controller(ServiceController::class)->group(function () {
    route::get('/services', 'index');
    route::post('/services/create', 'store');
    route::get('/services/show/{id}', 'show');
    route::post('/services/update/{id}', 'update');
    route::get('/services/delete/{id}', 'destroy');
});

// Features API
Route::controller(FeatureController::class)->group(function () {
    Route::get('/features', 'index');
    Route::get('/features/{id}', 'show');
    Route::post('/features/create', 'store');
    Route::post('/features/update/{id}', 'update');
    Route::get('/features/delete/{id}', 'destroy');
});

// Messages Module
Route::controller(MessageController::class)->group(function () {
    Route::get('/messages', 'index');
    Route::get('/message/{id}', 'show');
    Route::post('messages/create', 'store');
    Route::get('/message/delete/{id}', 'destroy');
});

// Settings Module
Route::controller(SettingController::class)->group(function () {
    Route::get('/settings', 'index');
    Route::post('/settings/update', 'update');
});

// Subscribers Module
Route::controller(SubscriberController::class)->group(function () {
    Route::get('/subscribers', 'index');
    Route::post('/subscribers/create', 'store');
});

// Testimonials Module
Route::controller(TestimonialController::class)->group(function () {
    Route::get('/testimonials', 'index');
    Route::get('/testimonials/show/{id}', 'show');
    Route::post('/testimonials/create', 'store');
    Route::post('/testimonials/update/{id}', 'update');
    Route::get('/testimonials/delete/{id}', 'destroy');
});
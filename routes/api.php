<?php

use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\API\StoreServiceController;
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

Route::controller(ServiceController::class)->group(function () {
    route::get('/services', 'index');
    route::post('/services/create', 'store');
    route::get('/services/show/{id}', 'show');
    route::post('/services/update/{id}', 'update');
    route::get('/services/delete/{id}', 'destroy');
});


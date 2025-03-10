<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::name('front.')->group(function () {
    Route::view('/', 'front.index')->name('index');
    Route::view('/about', 'front.about')->name('about');
    Route::view('/contact', 'front.contact')->name('contact');
    Route::view('/services', 'front.services')->name('services');
});


Route::name('admin.')->prefix(LaravelLocalization::setLocale() . '/admin')
    ->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
    ->group(function () {
        Route::middleware('auth')->group(function () {
            Route::view('/', 'admin.index')->name('index');
        });
        require __DIR__ . '/auth.php';
    });

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return View('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

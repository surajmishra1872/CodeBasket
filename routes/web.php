<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PushController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('auth.login');
});



Route::middleware(['auth', 'verified'])->group(function () {

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'viewProfile')->name('profile.view');
        Route::post('/profile-update', 'updateProfile')->name('profile.update');

        Route::post('/profile-password', 'updatePassword')->name('passwordUpdate');
    });

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::controller(PushController::class)->group(function () {
        Route::get('/add-to-basket', 'index')->name('AddToBasket');
        Route::post('/add-to-basket', 'store')->name('StoreToBasket');

        Route::get('/view-basket', 'viewBasket')->name('ViewToBasket');

        Route::get('/view-code/{code_id}', 'viewCode')->name('ViewCode');
        Route::post('/delete-code', 'deleteCode')->name('DeleteCode');
        Route::get('/edit-code/{code_id}', 'editCode')->name('EditCode');
        Route::post('/update-code', 'updateCode')->name('UpdateCode');

        Route::get('/search/', 'searchCode')->name('SearchCode');

    });

});


require __DIR__.'/auth.php';

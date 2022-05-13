<?php

use App\Http\Controllers\Admin\LoginController as AdminLoginController;

Route::group(['prefix' => 'admin'], function() {
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login.post');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', function() {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });
});
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.homepage');
});

Route::prefix('app')->group(function () {
    Route::get('/', function () {
        return view('app.dashboard');
    })->name('app.dashboard');
});

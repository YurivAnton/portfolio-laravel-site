<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('pages.homepage');
});

Route::prefix('app')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', function () {
            return view('app.dashboard');
    })->name('app.dashboard');
});

Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->middleware('auth')->name('logout');
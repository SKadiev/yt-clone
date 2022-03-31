<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class , 'index'])->name('home');
    Route::get('/channel/{channel}/edit', [\App\Http\Controllers\ChannelController::class, 'edit'])->name('channel.edit');
});

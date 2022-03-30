<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', \App\Http\Livewire\Home\IndexHome::class)->name('home');
    Route::get('/channel/{channel}/edit', \App\Http\Livewire\Channel\EditChannel::class);
});

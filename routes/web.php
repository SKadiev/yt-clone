<?php

use App\Http\Livewire\Home\IndexHome;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', IndexHome::class);
    Route::get('/channel/{channel}/edit', \App\Http\Livewire\Channel\EditChannel::class);
});

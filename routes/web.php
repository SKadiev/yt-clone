<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class , 'index'])->name('home');
    Route::get('/test', [\App\Http\Controllers\HomeController::class , 'testSend'])->name('test');
    Route::get('/channel/{channel}/edit', [\App\Http\Controllers\ChannelController::class, 'edit'])->name('channel.edit');

    Route::prefix('videos')->group(function () {
        Route::get('/{channel}/create', \App\Http\Livewire\Video\CreateVideo::class)->name('video.create');
        Route::get('/{channel}/{video}/edit', \App\Http\Livewire\Video\EditVideo::class)->name('video.edit');
        Route::get('/{channel}', \App\Http\Livewire\Video\AllVideo::class)->name('video.index');
        Route::delete('/{channel}{video}/delete', \App\Http\Livewire\Video\AllVideo::class)->name('video.delete');
    });

});

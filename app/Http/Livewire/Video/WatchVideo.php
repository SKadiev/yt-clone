<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Livewire\Component;

class WatchVideo extends Component
{
    public Video $video;

    public function render()
    {
        return view('livewire.video.watch-video')
            ->extends('layouts.app');
    }
}

<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use FFMpeg\FFMpeg;
use Livewire\Component;

class VideoComponent extends Component
{

    public Video $video;

    public function mount(Video $video)
    {
        $this->video->load('channel');
    }

    public function render()
    {
        return view('livewire.video.video-component');
    }
}

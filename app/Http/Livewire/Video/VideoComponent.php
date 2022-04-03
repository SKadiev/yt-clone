<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use FFMpeg\FFMpeg;
use Livewire\Component;

class VideoComponent extends Component
{

    public Video $video;

    public function render()
    {
//FFMpeg::openUrl('https://videocoursebuilder.com/lesson-1.mp4');
        return view('livewire.video.video-component');
    }
}

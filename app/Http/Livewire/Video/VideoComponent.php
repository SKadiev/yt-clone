<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use FFMpeg\FFMpeg;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class VideoComponent extends Component
{

    public Video $video;

    public function mount(Video $video)
    {
    }

    public function render()
    {
        return view('livewire.video.video-component');
    }

    public function delete(Video $video)
    {
        $deleted = Storage::disk('videos')->deleteDirectory('/convertions/' . $video->uid);

        if ($deleted) {
            Storage::disk('videos-temp')->delete($video->path);
            Storage::disk('thumnails')->delete($video->path);

            $video->delete();
            Cache::forget('channel_videos_' . $this->video->channel->slug);
            $this->emitUp('videos:remove');
        }

        return back();
    }
}

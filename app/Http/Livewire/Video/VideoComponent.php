<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use FFMpeg\FFMpeg;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\Guard;
use Livewire\Component;

class VideoComponent extends Component
{
    use AuthorizesRequests;
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
        $this->authorize('delete', $video);
        $deleted = Storage::disk('videos')->deleteDirectory('/convertions/' . $video->uid);

        if ($deleted) {
            Storage::disk('videos-temp')->delete($video->path);
            Storage::disk('thumnails')->delete($video->image->path);

            $video->delete();
            Cache::forget('channel_videos_' . $this->video->channel->slug);
            Cache::forget('channel_videos_global');
            $this->emitUp('videos:remove');
        }

        return back('201');
    }
}

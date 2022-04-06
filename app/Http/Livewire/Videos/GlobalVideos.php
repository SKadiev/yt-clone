<?php

namespace App\Http\Livewire\Videos;

use App\Enum\ChannelVisibility;
use App\Models\Channel;
use App\Models\Video;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class GlobalVideos extends Component
{
    public Collection  $videos;

    public function mount()
    {
        $this->videos = $this->loadVideos();
    }

    public function loadVideos()
    {
        $videos = Cache::remember('channel_videos_global', 60, function ()  {
            return Video::where('visibility', ChannelVisibility::PUBLIC->value)->get();
        });

        return $videos;
    }

    public function render()
    {

        return view('livewire.video.all-video')
            ->extends('layouts.app');
    }

}

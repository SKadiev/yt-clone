<?php

namespace App\Http\Livewire\Video;

use App\Models\Channel;
use App\Models\Video;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class AllVideo extends Component
{
    public $videos;

    public function mount(Channel $channel)
    {
        $videos = Cache::rememberForever('channel_videos_' . $channel->slug, function () use ($channel) {
            return $channel->videos;
        });

        $this->videos = $videos;
    }

    public function render()
    {

        return view('livewire.video.all-video')
            ->extends('layouts.app');
    }

}

<?php

namespace App\Http\Livewire\Video;

use App\Models\Channel;
use App\Models\Video;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class AllVideo extends Component
{
    public Collection  $videos;
    public Channel $channel;

    public $listeners = [
        'videos:remove' => 'loadVideos',
    ];
    public function mount(Channel $channel)
    {
        $this->videos = $this->loadVideos();
    }

    public function loadVideos()
    {
        $videos = Cache::rememberForever('channel_videos_' . $this->channel->slug, function ()  {
            return $this->channel->videos;
        });

        return $videos;
    }

    public function render()
    {

        return view('livewire.video.all-video')
            ->extends('layouts.app');
    }

}

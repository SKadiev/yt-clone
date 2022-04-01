<?php

namespace App\Http\Livewire\Video;

use App\Models\Channel;
use Livewire\Component;

class AllVideo extends Component
{
    public $videos;

    public function mount(Channel $channel)
    {
        $this->videos = $channel->videos;
    }

    public function render()
    {
        return view('livewire.video.all-video')
            ->extends('layouts.app');
    }


}

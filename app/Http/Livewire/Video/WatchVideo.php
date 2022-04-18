<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Livewire\Component;

class WatchVideo extends Component
{
    public $video;

    public function mount($video)
    {
        $this->video = Video::whereUid($video)->withCount(['likes as likes', 'dislikes as dislikes'])->first();
    }

    protected $listeners = [
        'videoViewed' => 'countView'
    ];

    public function render()
    {
        return view('livewire.video.watch-video')
            ->extends('layouts.app');
    }

    public function countView()
    {
        $this->video->update([
            'views' => $this->video->views + 1
        ]);
    }
}

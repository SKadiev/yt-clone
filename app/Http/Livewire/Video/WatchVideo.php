<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Livewire\Component;

class WatchVideo extends Component
{
    public $video;
    public int $videoCommentsCount;
    public $comments;

    public function mount($video)
    {
        $this->video = Video::whereUid($video)->withCount(['likes as likes', 'dislikes as dislikes', 'comments'])->with('comments')->first();
        $this->comments = $this->video->comments()->with('user')->get();
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

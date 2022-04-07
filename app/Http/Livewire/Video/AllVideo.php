<?php

namespace App\Http\Livewire\Video;

use App\Models\Channel;
use App\Models\Video;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class AllVideo extends Component
{
    use WithPagination;

    const PAGINATION_RESULTS_PER_PAGE = 2;
    private $videos;
    public Channel $channel;
    protected string $paginationTheme = 'bootstrap';

    public $listeners = [
        'videos:remove' => 'loadVideos',
    ];

    public function loadVideos()
    {
        return $this->channel->videos()->paginate(self::PAGINATION_RESULTS_PER_PAGE);
    }

    public function render()
    {
        return view('livewire.video.all-video', [
            'videos' => $this->loadVideos()
        ])->extends('layouts.app');
    }

}

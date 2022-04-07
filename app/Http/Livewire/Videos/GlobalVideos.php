<?php

namespace App\Http\Livewire\Videos;

use App\Enum\ChannelVisibility;
use App\Models\Channel;
use App\Models\Video;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class GlobalVideos extends Component
{
    use WithPagination;

    const PAGINATION_RESULTS_PER_PAGE = 5;
    protected string $paginationTheme = 'bootstrap';

    public function loadVideos()
    {
        return Video::paginate(self::PAGINATION_RESULTS_PER_PAGE);
    }

    public function render()
    {
        return view('livewire.video.all-video', [
            'videos' => $this->loadVideos()
        ])->extends('layouts.app');
    }

}

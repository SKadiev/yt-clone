<?php

namespace App\Http\Livewire\Videos;

use App\Classes\Traits\WithLayoutRendering;
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
    use WithLayoutRendering;

    const PAGINATION_RESULTS_PER_PAGE = 5;
    protected string $paginationTheme = 'bootstrap';

    public function loadVideos()
    {
        return Video::publicVideos()->orderByDesc('views')->paginate(self::PAGINATION_RESULTS_PER_PAGE);
    }

    public function render()
    {
        $videos = $this->loadVideos();
        return $this->renderWithLayout('livewire.video.all-video', compact('videos'));
    }

}

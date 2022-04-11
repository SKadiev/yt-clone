<?php

namespace App\Http\Livewire\Video;

use App\Classes\Traits\WithLayoutRendering;
use App\Models\Channel;
use App\Models\Video;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class AllVideo extends Component
{
    use WithPagination;
    use WithLayoutRendering;

    const PAGINATION_RESULTS_PER_PAGE = 5;
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
        $videos = $this->loadVideos();
        return $this->renderWithLayout('livewire.video.all-video', compact('videos'));

    }

}

<?php

namespace App\Http\Livewire\Video;

use App\Classes\Traits\WithLayoutRendering;
use App\Models\Video;
use Livewire\Component;

class Voting extends Component
{
    use WithLayoutRendering;
    public Video $video;

    public function render()
    {
        return $this->renderWithLayout('livewire.video.voting');
    }
}

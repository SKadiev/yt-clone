<?php

namespace App\Services;

use App\Events\ChannelUpdated;
use App\Exceptions\ImageNotStoredException;
use App\Http\Livewire\Channel\EditChannel;
use App\Http\Livewire\Video\CreateVideo;
use App\Models\Video;

class VideoRepository
{
    public function saveVideo(CreateVideo $videoDTO): void
    {
        $videoDTO->validate();
        $videoDTO->videoFile->store('videos');
        //
    }

}

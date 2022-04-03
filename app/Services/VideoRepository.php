<?php

namespace App\Services;

use App\Events\ChannelUpdated;
use App\Exceptions\ImageNotStoredException;
use App\Http\Livewire\Channel\EditChannel;
use App\Http\Livewire\Video\CreateVideo;
use App\Models\Video;
use Illuminate\Support\Facades\Log;

class VideoRepository
{
    const VIDEO_STORE_PATH = 'videos';

    public function saveVideo(CreateVideo $videoDTO): void
    {
        $videoDTO->validate();
        $videoPath = $videoDTO->videoFile->store(self::VIDEO_STORE_PATH);
        $videoDTO->video = $videoDTO->channel->videos()->create([
            'title' => 'untitled',
            'description' => 'none',
            'uid' => uniqid(true),
            'visibility' => 'unlisted',
            'path' => $videoPath
        ]);
    }

    public function log()
    {
        Log::info('service');
    }

}

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
    protected const VIDEO_STORE_DRIVER = 'videos-temp';
    protected const VIDEO_EXTENSION = 'mp4';
    protected const VIDEO_ORIGINAL_DIRECTORY = '';

    public function saveVideo(CreateVideo $videoDTO): void
    {
        $videoDTO->validate();
        $uniqid = uniqid(true);

        $videoFileName = $uniqid . '.' . self::VIDEO_EXTENSION;

        $videoPath = $videoDTO->videoFile->storeAs(
            self::VIDEO_ORIGINAL_DIRECTORY,
            $videoFileName,
            self::VIDEO_STORE_DRIVER
        );

        $videoDTO->video = $videoDTO->channel->videos()->create([
            'title' => 'untitled',
            'description' => 'none',
            'uid' => $uniqid,
            'visibility' => 'unlisted',
            'path' => $videoFileName
        ]);
    }

    public function log()
    {
        Log::info('service');
    }

}

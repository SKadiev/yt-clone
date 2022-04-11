<?php

namespace App\Jobs;

use App\Events\ChannelUpdated;
use App\Models\Video;
use FFMpeg\Format\Video\X264;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use SebastianBergmann\Environment\Console;

class ConvertVideoForStreaming implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public Video $video;

    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $savePath = '/convertions/' . $this->video->uid .'/' . $this->video->uid . '.m3u8';
        $low = (new X264('aac'))->setKiloBitrate(500);
        $high = (new X264('aac'))->setKiloBitrate(1000);
        FFMpeg::fromDisk('videos-temp')
            ->open($this->video->path)
            ->exportForHLS()
            ->addFormat($low, function ($media) {
                $media->resize(640, 480);
            })
            ->addFormat($high, function ($media) {
                $media->resize(1280, 720);
            })
            ->onProgress(function ($progress) {
                $this->video->update([
                    'processing_percentage' => $progress
                ]);
            })
            ->toDisk('videos')
            ->save($savePath);

        $this->video->update([
            'processed' => true,
            'processed_file' => $this->video->uid . '.m3u8'
        ]);

    }
}

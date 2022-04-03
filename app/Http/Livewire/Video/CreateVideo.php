<?php

namespace App\Http\Livewire\Video;

use App\Events\VideoCreated;
use App\Models\Channel;
use App\Models\Video;
use App\Services\VideoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVideo extends Component
{
    use WithFileUploads;

    public Channel $channel;
    public Video $video;
    public $videoFile;
    public bool $uploadCompleted = false;

    public function render()
    {
        return view('livewire.video.create-video')->extends('layouts.app');
    }

    public function rules(): array
    {
        return [
            'videoFile' => 'required|mimes:mp4|max:102400'
        ];
    }

    public function upload(VideoRepository $repository, Request $request)
    {
        $repository->saveVideo($this);
        $this->videoStored($request);
    }

    public function fileUploaded(): bool
    {
        return $this->uploadCompleted = true;
    }

    public function videoStored(Request $request)
    {
        event(new VideoCreated($this->video, $this->channel));

        return $this->redirect(
            route('video.edit', [$this->channel, $this->video])
        )->with('message', "Video updated");
    }

}

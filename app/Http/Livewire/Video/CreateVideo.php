<?php

namespace App\Http\Livewire\Video;

use App\Models\Channel;
use App\Models\Video;
use App\Services\VideoRepository;
use Illuminate\Http\Request;
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

    public function upload(VideoRepository $repository)
    {
        $repository->saveChannel($this);
    }

    public function fileUploaded(): bool
    {
        return $this->uploadCompleted = true;
    }

    public function fileStored(Request $request)
    {
        return $this->redirect(route('video.index', $this->channel));
    }

}

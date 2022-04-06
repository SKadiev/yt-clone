<?php

namespace App\Classes;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;

class CleanTempUploads
{

    public function __construct()
    {
    }

    public function __invoke()
    {
        try {
            $files = Storage::allFiles('livewire-tmp');
            Storage::delete($files);
            Log::info("livewire-tmd directory cleaned");
        } catch (\Exception $e) {
            Log::error('livewire-tmd directory cleaning failed');
        }

    }
}

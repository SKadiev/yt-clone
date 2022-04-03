<?php

namespace App\Classes;

use App\Exceptions\ImageNotStoredException;
use App\Models\Channel;
use App\Models\Video;
use Intervention\Image\ImageManagerStatic as ImageMenager;
use Livewire\TemporaryUploadedFile;

class ChannelImage extends Image
{

    public function __construct(protected Channel $channel, private TemporaryUploadedFile $image)
    {

    }

    public function imageStore(): void
    {
        if ($this->image) {
            $videoIdentifierName = $this->channel->uid;
            $d =
            $image = $this->image->storeAs(
                self::PHOTOS_DIRECTORY, $videoIdentifierName . '.' . self::IMAGE_EXTENSION,
                self::BASE_PHOTO_DIRECTORY);
            $image = explode('/', $image)[1];

            $imgStoragePath = storage_path(self::FULL_PHOTOS_DIRECTORY );
            $img = ImageMenager::make($imgStoragePath . '/' . $image)
                ->encode(self::IMAGE_EXTENSION)
                ->fit(100, 100, function ($constraint) {
                    $constraint->upsize();
                })->save();
            $this->channel->update(['image' => $image]);
        } else {
            throw new ImageNotStoredException();
        }
    }
}

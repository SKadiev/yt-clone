<?php

namespace App\Classes;

class Image
{
    protected const IMAGE_EXTENSION = 'png';
    protected const PHOTOS_DIRECTORY = 'photos';
    protected const BASE_PHOTO_DIRECTORY = 'public';
    protected const FULL_PHOTOS_DIRECTORY = 'app/' .
    self::BASE_PHOTO_DIRECTORY . DIRECTORY_SEPARATOR .
    self::PHOTOS_DIRECTORY;


}

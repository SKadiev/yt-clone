<?php

namespace App\Enum;

enum ChannelVisibility: string
{
    case PRIVATE  = 'private';
    case PUBLIC  = 'public';
    case UNLISTED  = 'unlisted';

    public function toString(): string
    {
        return $this->value;
    }

}

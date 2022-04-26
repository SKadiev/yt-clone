<?php

namespace App\Http\Livewire\Comment;

use App\Models\Comment;
use App\Models\Video;
use Livewire\Component;

class ReplyComment extends Component
{
    public $repliesCount;
    public Video $video;
    public Comment $comment;

    public function render()
    {
        return view('livewire.comment.reply-comment');
    }


}

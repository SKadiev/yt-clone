<?php

namespace App\Http\Livewire\Comment;

use App\Classes\Traits\WithLayoutRendering;
use App\Models\Channel;
use App\Models\Comment;
use Livewire\Component;
use function view;

class CommentDisplay extends Component
{
    use WithLayoutRendering;

    public Channel $channel;
    public Comment $comment;

    public function render()
    {
        return view('livewire.comment.comment-display');
    }
}

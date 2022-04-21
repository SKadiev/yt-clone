<?php

namespace App\Http\Livewire\Comment;

use App\Models\Channel;
use App\Models\Video;
use Livewire\Component;

class CommentInfo extends Component
{
    public Channel $channel;
    public Video $video;
    public string $commentBody = '';
    public int $commentsCount;

    public function render()
    {
        return view('livewire.comment.comment-info');
    }

    public function mount()
    {
        $this->commentsCount = $this->video->comments_count;
    }

    public function commentOnVideo()
    {
        if ($this->commentBody) {

            $this->video->comments()->create([
                'user_id' => auth()->id(),
                'body' => $this->commentBody
            ]);

            $this->commentsCount += 1;
        }

    }
}

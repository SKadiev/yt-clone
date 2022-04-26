<?php

namespace App\Http\Livewire\Comment;

use App\Classes\Traits\WithLayoutRendering;
use App\Models\Channel;
use App\Models\Comment;
use App\Models\Video;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use function view;

class CommentDisplay extends Component
{
    use WithLayoutRendering;

    public Channel $channel;
    public Comment $comment;
    public Video $video;
    public int $likes;
    public int $dislikes;
    public  $repliesCount;
    public Collection $replies;

    public function mount()
    {
        $this->comment->loadCount(['likes', 'dislikes', 'replies']);
        $this->likes = $this->comment->likes_count;
        $this->dislikes = $this->comment->dislikes_count;
        $this->repliesCount = $this->comment->replies_count;
        $this->replies = $this->comment->replies()->with('replyComment')->get();
    }

    public function render()
    {
        return view('livewire.comment.comment-display');
    }

    public function likeComment()
    {
        if ($this->comment->doesUserLikeComment()) {
            $this->comment->likes()
                ->currentUser()
                ->where('likeable_type', Comment::class)
                ->delete();

        } else {
            if ($this->comment->doesUserDislikeComment()) {
                $this->comment->dislikes()
                    ->currentUser()
                    ->where('dislikeable_type', Comment::class)
                    ->delete();
                $this->dislikes = $this->dislikes - 1;
            }
            $this->comment->likes()->create([
                'user_id' => auth()->user()->id,
                'video_id' => $this->video->id
            ]);
        }

        $this->likes = $this->comment->likes()->count();
    }

    public function dislikeComment()
    {
        if ($this->comment->doesUserDislikeComment()) {
            $this->comment->dislikes()
                ->currentUser()
                ->where('dislikeable_type', Comment::class)
                ->delete();

        } else {
            if ($this->comment->doesUserLikeComment()) {
                $this->comment->likes()
                    ->currentUser()
                    ->where('likeable_type', Comment::class)->delete();
                $this->likes = $this->likes - 1;
            }
            $this->comment->dislikes()->create([
                'user_id' => auth()->user()->id,
                'video_id' => $this->video->id
            ]);
        }

        $this->dislikes = $this->comment->dislikes()->count();
    }

    public function replyOnComment()
    {
        
    }
}

<?php

namespace App\Http\Livewire\Video;

use App\Classes\Traits\WithLayoutRendering;
use App\Models\User;
use App\Models\Video;
use Livewire\Component;
use Nette\Utils\Paginator;

class Voting extends Component
{
    use WithLayoutRendering;

    public Video $video;
    public int $likes;
    public int $dislikes;
    public bool $isLikesActive;
    public bool $isDislikesActive;

    protected $listeners = [
        'like' => "likeVideo",
        'dislike' => "dislikeVideo",
    ];

    public function mount()
    {
        $this->likes = $this->video->likes;
        $this->dislikes = $this->video->dislikes;
    }

    public function render()
    {
        return $this->renderWithLayout('livewire.video.voting');
    }


    public function likeVideo()
    {
        if ($this->video->doesUserLikeVideo()) {
            $this->video->likes()->currentUser()->delete();

        } else {
            if ($this->video->doesUserDislikeVideo()) {
                $this->video->dislikes()->currentUser()->delete();
                $this->dislikes = $this->dislikes - 1;
            }
            $this->video->likes()->create([
                'user_id' => auth()->user()->id,
                'video_id' => $this->video->id
            ]);
        }

        $this->likes = $this->video->likes()->count();

    }

    public function dislikeVideo()
    {
        if ($this->video->doesUserDislikeVideo()) {
            $this->video->dislikes()->currentUser()->delete();
        } else {
            if ($this->video->doesUserLikeVideo()) {
                $this->video->likes()->currentUser()->delete();
                $this->likes = $this->likes - 1;
            }
            $this->video->dislikes()->create([
                'user_id' => auth()->user()->id,
                'video_id' => $this->video->id

            ]);
        }

        $this->dislikes = $this->video->dislikes()->count();

    }

}

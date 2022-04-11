<div>
    <div class="d-flex text-gray">
        <div class="d-flex align-items-center">
            <span wire:click.prevent="likeVideo" class="material-icons" style="font-size: 2rem;cursor: pointer">thumb_up</span>
            <span class="mx-2" >{{$likes}}</span>
            <span wire:click.prevent="dislikeVideo" class="mx-2 material-icons" style="font-size: 2rem; cursor: pointer">thumb_down</span>
            <span class="mx-2" >{{$dislikes}}</span>
        </div>
    </div>
</div>

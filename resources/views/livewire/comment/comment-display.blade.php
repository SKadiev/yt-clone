<div>
    <div>
        <div class="d-flex justify-content-center row">
            <h1>{{$channel->name}}</h1>
            <div class="comment-dialog">
                <div class="bg-light p-2">
                    <div class="d-flex flex-row align-items-start"><img class="mx-2 rounded-circle" src="{{$channel->image}}"
                                                                        width="40">
                        <textarea disabled class="form-control ml-1 shadow-none textarea">{{$comment->body}}</textarea>
                    </div>
                    <div class="mt-2 text-right">
                        <button wire:click="commentOnVideo"  class="btn btn-dark btn-sm shadow-none" type="button">Reply</button>
                        <div>
                            <div class="d-flex text-gray">
                                <div class="d-flex align-items-center">
                                    <span wire:click.prevent="likeVideo" class="material-icons" style="font-size: 2rem;cursor: pointer">thumb_up</span>
                                    <span class="mx-2" >100</span>
                                    <span wire:click.prevent="dislikeVideo" class="mx-2 material-icons" style="font-size: 2rem; cursor: pointer">thumb_down</span>
                                    <span class="mx-2" >1000</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div>
    <div class="d-flex justify-content-center row">
        <div class="comment-dialog">
            <div class="bg-light p-2">
                <div class="d-flex flex-row align-items-start"><img class="mx-2 rounded-circle"
                                                                    src="{{$channel->image}}"
                                                                    width="40">
                    <textarea wire:model.debounce.200ms="commentBody"
                              class="form-control ml-1 shadow-none textarea"></textarea>
                </div>
                <div class="mt-2 text-right">
                    <button wire:click="replyOnComment" class="btn btn-dark btn-sm shadow-none" type="button">Comment
                    </button>
                    <button @click="replySectionOpen = !replySectionOpen"
                            class="btn btn-outline-dark btn-sm ml-1 shadow-none" type="button">Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

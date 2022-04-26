<div>
    <div>
        <div x-data="{ replies: {{$repliesCount}}}" class="d-flex justify-content-center row">
            <h3>{{$channel->name}}<span class="px-2">{{$comment->created_at->diffForHumans()}}</span></h3>
            <div class="comment-dialog">
                <div class="bg-light p-2">
                    <div class="d-flex flex-row align-items-start"><img class="mx-2 rounded-circle"
                                                                        src="{{$channel->image}}"
                                                                        width="40">
                        <textarea disabled class="form-control ml-1 shadow-none textarea">{{$comment->body}}</textarea>
                    </div>
                    <div x-data="{ replySectionOpen: false }" class="mt-2 text-right">
                        <button @click="replySectionOpen=!replySectionOpen"
                                class="btn btn-dark btn-sm shadow-none" type="button">
                            Reply
                        </button>
                        {{--                        <div x-show="replySectionOpen">--}}
                        {{--                            <livewire:comment.reply-comment :channel="$video->channel" :video="$video"--}}
                        {{--                                                            :repliesCount="$repliesCount"/>--}}

                        {{--                        </div>--}}
                        <div>
                            <div class="d-flex text-gray">
                                <div class="d-flex align-items-center">
                                    <span wire:click.prevent="likeComment" class="material-icons"
                                          style="font-size: 2rem;cursor: pointer">thumb_up</span>
                                    <span class="mx-2">{{$likes}}</span>
                                    <span wire:click.prevent="dislikeComment" class="mx-2 material-icons"
                                          style="font-size: 2rem; cursor: pointer">thumb_down</span>
                                    <span class="mx-2">{{$dislikes}}</span>
                                </div>
                            </div>
                            <template x-if="replies > 0 ? true : false">
                                <div x-data="{open: false}" class="d-flex align-items-center">
                                    <a @click.prevent="open = ! open" href="#">
                                        View {{$repliesCount === 1 ? ' reply' : $repliesCount . ' replies'}} </a>

                                    <template x-if="open">
                                        @foreach($replies as $commentReply)
                                            <div>
                                                <livewire:comment.reply-comment :comment="$commentReply->replyComment"
                                                                                :video="$video"
                                                                                :channel="$commentReply->replyComment->user->channel"/>
                                            </div>
                                        @endforeach
                                    </template>

                                </div>
                            </template>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

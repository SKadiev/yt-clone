<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{$video->title}}
                </div>
                <div class="card-body col-md-12">
                    <div class="row">
                        <div class="">
                            <a href="{{route('video.watch', $video)}}">
                                <img class="video-thumbnail" src="{{$video->thumbnail}}" alt="{{$video->title}}">
                            </a>
                        </div>
                    </div>
                    <p>{{$video->description}}</p>
                    <div class="row">
                        <div class="">

                            @can('update', $video->channel)
                                <a href="{{route('video.edit', [$video->channel, $video])}}"
                                   class="my-2 btn btn-light btn-sm">Edit</a>

                                <a wire:click.prevent="delete('{{$video->uid}}')"
                                   class="my-2 btn btn-danger btn-sm">Delete</a>
                            @endcan

                        </div>
                    </div>
                    <span
                        class="blockquote-footer">{{$video->views}} views .  {{$video->uploated_date}}</span>
                </div>
            </div>
        </div>
    </div>
</div>


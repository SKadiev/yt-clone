<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{$video->title}}
                </div>
                <div class="card-body col-md-12">
                    <blockquote class="blockquote mb-0">
                        <div class="row">
                            <div class="col-md-10">
                                <img class="video-thumbnail" src="{{$video->thumbnail}}" alt="{{$video->title}}">
                            </div>
                        </div>
                        <p>{{$video->description}}</p>
                        <div class="row">
                            <div class="col-md-10">
                                <video
                                    id="my-video"
                                    class="video-js"
                                    controls
                                    preload="auto"
                                    width="640"
                                    height="264"
{{--                                    poster="{{ $video->path}}"--}}
                                    data-setup="{}"
                                >
                                    <source src="{{asset('videos/temp/' . $video->path)}}" type="video/mp4">
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a
                                        web browser that
                                        <a href="https://videojs.com/html5-video-support/" target="_blank"
                                        >supports HTML5 video</a
                                        >
                                    </p>
                                </video>
                                <a href="{{route('video.edit', [$video->channel, $video])}}" class="my-2 btn btn-light btn-sm">Edit</a>

                                <a  wire:click.prevent="delete('{{$video->uid}}')"  class="my-2 btn btn-danger btn-sm">Delete</a>

                            </div>
                        </div>
                        <footer class="blockquote-footer">Created at {{$video->created_at}}</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>

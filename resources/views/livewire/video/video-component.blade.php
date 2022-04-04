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
                                    poster="MY_VIDEO_POSTER.jpg"
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
                            </div>
                        </div>
                        <footer class="blockquote-footer">Created at {{$video->created_at}}</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>

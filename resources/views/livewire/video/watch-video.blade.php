<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="video-container">
                <div class="video-container">
                    <video
                        id="yt-video"
                        class="video-js vjs-fluid vjs-styles=defaults vjs-big-play-centered"
                        controls
                        preload="auto"
                        width="640"
                        height="264"
                        {{--                                    poster="{{ $video->path}}"--}}
                        data-setup="{}"
                    >
                        <source src="{{asset('videos/' . $video->uid . '/' . $video->processed_file)}}"
                                type="application/x-mpegURL">
                        >
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
        </div>
    </div>
</div>

@push('video-stack')
    <script src="https://vjs.zencdn.net/7.18.1/video.min.js"></script>
@endpush

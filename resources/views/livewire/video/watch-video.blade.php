@push('css')
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
@endpush
<div class="container">
    <div class="row ">
        <div class="col-md-12">
{{--            <div class="video-container">--}}
                <div wire:ignore class="video-container">
                    <video
                        id="yt-video"
                        class="video-js vjs-fluid vjs-styles=defaults vjs-big-play-centered"
                        controls
                        preload="auto"
                        width="640"
                        height="264"
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
{{--                </div>--}}
            </div>
        </div>
    </div>
    <div class="row">

    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mt-4">{{$video->title}}</h3>
                            <p class="gray-text">{{$video->views}} views . {{$video->uploated_date}}</p>
                        </div>
                        <div >
                            <livewire:video.voting :video="$video" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12"></div>
                </div>
            </div>
        </div>
    </div>

    @push('video-stack')
        <script src="https://vjs.zencdn.net/7.18.1/video.min.js"></script>
        <script>
            let player = videojs('yt-video')
            player.on('timeupdate', function () {
                if (this.currentTime() > 3) {
                    this.off('timeupdate');
                    Livewire.emit('videoViewed');
                }
            })
        </script>
@endpush

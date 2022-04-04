<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <img src="{{asset('thumnails/' . $video->thumbnail_image)}}" alt="{{$video->title}}">
                <p>{{$video->title}}</p>
                <a href="{{route('video.edit', [$video->channel, $video])}}">
                    Edit</a>

                <video width="320" height="240" controls>
                    <source src="{{asset($video->path)}}" type="video/mp4">
{{--                    <source src="movie.ogg" type="video/ogg">--}}
                    Your browser does not support the video tag.
                </video>
                <hr>
            </div>
        </div>
    </div>
</div>

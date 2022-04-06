<div xmlns:livewire="http://www.w3.org/1999/html">
    <ul>
        @foreach($videos as $video)
            <li wire:key="video-id{{ $video->uid }}">
                <livewire:video.video-component :video="$video"/>
            </li>
        @endforeach
    </ul>
</div>

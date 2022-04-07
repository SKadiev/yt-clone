<div  xmlns:livewire="http://www.w3.org/1999/html">
    @forelse($videos as $video)
        <li wire:key="video-id-{{ $video->uid }}">
            <livewire:video.video-component :video="$video" wire:key="video-component-{{ $video->uid }}"/>
        </li>
        @empty
            <h1 class="offset-3">No videos</h1>
    @endforelse
{{--    @if(\Route::is('videos.global'))--}}
        <div class="col-md-6 offset-3 pagination-nav">
            {{ $videos->links() }}
        </div>
{{--    @endif--}}
</div>

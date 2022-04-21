<div class="my-2">
    <div class="d-flex align-items-center justify-content-between">

        <div class="d-flex align-items-center ">
            <img src="{{$channel->image}}" alt="{{$channel->name}}" class="rounded-circle mx-2">
            <div class="ml-3">
                <h4>{{$channel->name}}</h4>
                <p class="gray-text text-sm">{{$channel->subscribers()}} subscribers</p>
            </div>
        </div>

        <div>
            <button wire:click.prevent="subscribe"
                    class="btn btn-lg text-uppercase btn-secondary {{$isActive ? 'subscribeBtn' : 'activeSusbcribeBtn'}}">
                {{$isActive ? 'Subscribed' : 'Subscribe'}}
            </button>
        </div>
    </div>
</div>

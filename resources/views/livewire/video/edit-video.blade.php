<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div @if($video->processing_percentage < 100)
                     wire:poll.750ms
                     @endif
                     class="card-header">
                    {{ __('Edit video') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form x-data="{ transformationInProgress: true }" wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="video-thumbnail" src="{{$video->thumbnail}}" alt="{{$video->title}}">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <span x-show="$wire.videoProccessing" x-text="$wire.processing_percentage"></span>
                        </div>

                        <div class="progress my-2" x-show="$wire.videoProccessing">
                            <div class="progress-bar" role="progressbar"
                                 :style="`width: {{$video->processing_percentage}}%`">
                            </div>
                        </div>
                        <div class="form-group my-2">
                            <input wire:model="video.title" type="text">
                        </div>
                        @error('title')
                        <div class="alert alert-danger"> {{$message}}</div>
                        @enderror
                        <div class="form-group my-2">
                            <input wire:model="video.description" type="text">
                        </div>
                        @error('description')
                        <div class="alert alert-danger"> {{$message}}</div>
                        @enderror
                        <div class="form-group my-2">
                            <select class="d-block" wire:model="video.visibility">
                                <option
                                    value="{{ \App\Enum\ChannelVisibility::PRIVATE->value}}">
                                    {{\App\Enum\ChannelVisibility::PRIVATE->value}}
                                </option>
                                <option
                                    value="{{\App\Enum\ChannelVisibility::PUBLIC->value}}">
                                    {{\App\Enum\ChannelVisibility::PUBLIC->value}}
                                </option>
                                <option
                                    value="{{\App\Enum\ChannelVisibility::UNLISTED->value}}">
                                    {{\App\Enum\ChannelVisibility::UNLISTED->value}}
                                </option>
                            </select>
                        </div>
                        @error('visibility')
                        <div class="alert alert-danger"> {{$message}}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary mb-2" >
                            Submit
                        </button>
                        @if(session()->has('message'))
                            <div class="mt-2 mb-2 alert alert-success">
                                {{session('message')}}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

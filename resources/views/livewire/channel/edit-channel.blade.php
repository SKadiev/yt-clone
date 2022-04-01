<div>
    @if($channel)
        <img src="{{ asset($channel->image)}}">
    @endif
    <form wire:submit.prevent="save">
        <div class="form-group">
            <label for="name">Name</label>
            <input wire:model.lazy="channel.name" type="text"
                   class="form-control" id="name">
        </div>
        @error('channel.name')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
        <div class="form-group">
            <label for="slug">Slug</label>
            <input wire:model.lazy="channel.slug" type="text"
                   class="form-control" id="slug">
        </div>
        @error('channel.slug')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
        <div class="form-group">
            <label for="description">Description</label>
            <textarea wire:model.lazy="channel.description"
                      class="form-control mb-2" id="description"></textarea>
        </div>
        @error('channel.description')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror

        <div class="form-group mb-2"
             x-data="{ isUploading: false, progress: 0 }"
             x-on:livewire-upload-start="isUploading = true"
             x-on:livewire-upload-finish="isUploading = false, $wire.fileUploaded()"
             x-on:livewire-upload-error="isUploading = false"
             x-on:livewire-upload-progress="progress = $event.detail.progress">
            <div class="progress my-2" x-show="isUploading">
                <div class="progress-bar" role="progressbar"
                     :style="`width: ${progress}%`">
                </div>
            </div>
            <label for="image">Avatar image</label>
            <br/>
            <input type="file" wire:model="image">
            @if ($image)
                <div class="form-control my-2">
                    <img class="avatar-img-preview" src="{{ $image->temporaryUrl() }}">
                </div>
                Photo Preview:
            @endif
            @error('image')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
            <br>
            <button
                type="submit" class="btn btn-primary my-2">
                Submit
            </button>
            @if(session()->has('message'))
                <div class="mt-2 mb-2 alert alert-success">
                    {{session('message')}}
                </div>
            @endif
        </div>
    </form>
</div>

<div class="container">
    <div class="row justify-content-center">
        <h1 x-data="{ message: 'I ❤️ Alpine' }">
            <span x-text="message"></span>
        </h1>
        <span x-text="message"></span>

        <div class="col-md-8">
            <div x-data="{ isUploading: false, progress: 0 }"
                 x-on:livewire-upload-start="isUploading = true"
                 x-on:livewire-upload-finish="isUploading = false, $wire.fileCompleted()"
                 x-on:livewire-upload-error="isUploading = false"
                 x-on:livewire-upload-progress="progress = $event.detail.progress" class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="progress my-2 d-none" x-show="isUploading">
                        <div class="progress-bar" role="progressbar"
                             :style="`width: ${progress}%`"></div>
                    </div>
                    Create Video
                    <form  wire:submit.prevent="upload">
                        <div class="form-group my-2">
                            <input wire:model="videoFile" type="file">
                        </div>

                        @error('videoFile')
                        <div class="alert alert-danger"> {{$message}}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary mb-2">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
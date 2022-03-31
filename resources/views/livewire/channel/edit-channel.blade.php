<div>
    <h1>Edit channel</h1>
    <form wire:submit.prevent="save">
        <div class="form-group">
            <label for="name">Name</label>
            <input wire:model.lazy="channel.name" type="text" class="form-control" id="name">
        </div>
        @error('channel.name')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
        <div class="form-group">
            <label for="slug">Slug</label>
            <input wire:model.lazy="channel.slug" type="text" class="form-control" id="slug">
        </div>
        @error('channel.slug')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
        <div class="form-group">
            <label for="description">Description</label>
            <textarea wire:model.lazy="channel.description" class="form-control" id="description"></textarea>
        </div>
        @error('channel.description')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
    </form>
</div>

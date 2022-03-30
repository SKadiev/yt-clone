<div>
    <h1>Edit channel</h1>
    <form wire:submit.prevent="save">
        <div class="form-group">
            <label for="name">Name</label>
            <input wire:model.lazy="channel.name" type="text" class="form-control" id="name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

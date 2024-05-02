<form method="POST"
    @if ($updatedId) wire:submit.prevent="handleUpdate"
    @else
    wire:submit.prevent="handleSubmit" @endif>
    <div>
        <label for="ssid" class="form-label">
            SSID
        </label>
        <input type="text" wire:model="ssid" class="form-control @error('ssid') is-invalid @enderror" id="ssid">
        @error('ssid')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <label for="password" class="form-label">
            Password
        </label>
        <input type="text" wire:model="password" class="form-control @error('password') is-invalid @enderror"
            id="password">
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    @if ($updatedId)
        <div class="mt-3">
            <button class="btn btn-primary" wire:loading.attr="disabled" type="submit">
                <span wire:loading>Loading...</span>
                <span wire:loading.remove>Update</span>
            </button>
            <button class="btn btn-danger" wire:loading.remove class="button"
                wire:click.prevent="handleCancel">Batal</button>
        </div>
    @else
        <div class="mt-3">
            <button class="btn btn-primary" wire:loading.attr="disabled" type="submit">
                <span wire:loading>Tunggu...</span>
                <span wire:loading.remove>Simpan</span>
            </button>
        </div>
    @endif
</form>

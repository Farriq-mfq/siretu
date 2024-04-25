<form method="POST" wire:submit.prevent="handleSubmit">
    @csrf
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
    <div class="mt-3">
        <button class="btn btn-primary" type="submit">
            <span wire:loading>Loading...</span>
            <span wire:loading.remove>Simpan</span>
        </button>
    </div>
</form>

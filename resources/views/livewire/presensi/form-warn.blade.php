<form wire:submit.prevent="handleSend">
    <div class="mb-2">
        <label class="form-label">
            Masukan pesan peringatan
        </label>
        <textarea name="message" wire:model="message" class="form-control @error('message') is-invalid @enderror"></textarea>
        @error('message')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-2">
        <button class="btn btn-primary" wire:loading.attr="disabled">
            <span wire:loading>Loading</span>
            <span wire:loading.remove>Kirimkan</span>
        </button>
    </div>
</form>

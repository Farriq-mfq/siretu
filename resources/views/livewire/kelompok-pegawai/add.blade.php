<div>
    <form method="POST" wire:submit.prevent="onSubmit">
        @csrf
        <div>
            <label class="form-label">Nama kelompok</label>
            <input wire:model="kelompok" type="text" class="form-control  @error('kelompok') is-invalid @enderror"
                placeholder="Contoh : TATA USAHA">
            @error('kelompok')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                <span wire:loading target="onSubmit">Loading...</span>
                <span wire:loading.remove target="onSubmit">Tambah kelompok</span>
            </button>
        </div>
    </form>
</div>

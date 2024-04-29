<div>
    <form wire:submit.prevent="handleImport" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <input wire:model="file" type="file" class="form-control @error('file') is-invalid @enderror"
                accept=".xlsx,.xls">
            @error('file')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mt-3">
            <button class="btn btn-primary" type="submit" wire:loading.attr="disabled">
                <span wire:loading.remove>Import</span>
                <span wire:loading>Tunggu...</span>
            </button>
        </div>
    </form>
</div>
</div>

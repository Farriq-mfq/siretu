<div>
    <form wire:submit.prevent="handleImport" method="POST" enctype="multipart/form-data">
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
            @if ($file)
                <button class="btn btn-primary" type="submit" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:targe="handleImport">Import</span>
                    <span wire:loading wire:targe="handleImport">Loading...</span>
                </button>
            @else
                <div class="spinner-border text-primary" role="status" wire:loading>
                    <span class="visually-hidden">Loading...</span>
                </div>
            @endif
        </div>
    </form>
</div>
</div>

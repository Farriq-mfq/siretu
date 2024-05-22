<div class="card">
    <div class="card-header">
        <a href="{{ route('kelas') }}">Kembali</a>
        <p class="card-description mt-3">
            Yakin ingin reset semua kelas ?
        </p>
    </div>
    <div class="card-body">
        <button wire:click.prevent="handleReset" class="btn btn-outline-danger" type="button" wire:loading.attr="disabled">
            <span wire:loading.remove>
                Reset kelas
            </span>
            <span wire:loading>
                Reseting...
            </span>
        </button>
    </div>
</div>

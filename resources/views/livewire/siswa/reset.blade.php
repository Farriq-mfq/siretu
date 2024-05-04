<div>
    <button wire:click.prevent="handleReset" class="btn btn-outline-danger" type="button" wire:loading.attr="disabled">
        <span wire:loading.remove wire:target="onReset">
            Reset data siswa
        </span>
        <span wire:loading wire:target="onReset">
            Reseting...
        </span>
    </button>
</div>

<div class="d-flex gap-2">
    <button wire:click.prevent="handleEdit" class="btn btn-icon btn-primary">
        <i class="bx bx-pencil" wire:loading.remove></i>
        <div class="spinner-border spinner-border-sm text-light" role="status" wire:loading>
            <span class="visually-hidden">Loading...</span>
        </div>
    </button>

    </button>
    <button wire:click.prevent="handleDelete" class="btn btn-danger btn-icon">
        <i class="bx bx-trash" wire:loading.remove></i>
        <div class="spinner-border spinner-border-sm text-light" role="status" wire:loading>
            <span class="visually-hidden">Loading...</span>
        </div>
    </button>
</div>

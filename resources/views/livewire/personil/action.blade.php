<div class="d-flex gap-2 align-items-center">
    <a wire:loading.attr="disabled" href="{{ route('personil.edit', ['personil' => $id]) }}"
        class="btn btn-primary btn-icon">
        <i class="tf-icons bx bx-pencil"></i>
    </a>
    <button wire:loading.attr="disabled" wire:click.prevent="handleDelete" class="btn btn-danger btn-icon">
        <i class="tf-icons bx bx-trash"></i>
    </button>
</div>

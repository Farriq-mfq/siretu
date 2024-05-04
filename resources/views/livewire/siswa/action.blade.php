<div>
    <div class="d-flex gap-2 align-items-center">
        <a href="{{ route('personil') }}" class="btn btn-primary btn-icon">
            <i class="tf-icons bx bx-pencil"></i>
        </a>
        <button wire:click.prevent="handleDelete" wire:loading.attr="disabled" class="btn btn-danger btn-icon">
            <i class="tf-icons bx bx-trash"></i>
        </button>
    </div>
</div>

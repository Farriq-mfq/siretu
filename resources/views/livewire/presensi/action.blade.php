<div>
    <button wire:click="$dispatch('openModal', { component: 'test' })">Edit User</button>
    {{-- <button class="btn btn-danger btn-icon" wire:loading.attr="disabled">
        <div class="spinner-border spinner-border-sm text-light" role="status" wire:loading>
            <span class="visually-hidden">Loading...</span>
        </div>
        <i class="bx bx-reset" wire:loading.remove></i>
    </button> --}}
</div>

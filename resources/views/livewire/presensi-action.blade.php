<div>
    <button type="button" class="btn btn-danger btn-icon" data-bs-toggle="modal" data-bs-target="#modal-test-wifi">
        <i class="bx bx-trash"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modal-test-wifi" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Konfirmasi
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-left p-0">
                    Yakin ingin menghapus data ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button wire:click="handleDelete" class="btn btn-danger btn-icon" wire:loading.attr="disabled">
                        <i class="bx bx-trash" wire:loading.remove></i>
                        <div class="spinner-border spinner-border-sm text-light" role="status" wire:loading>
                            <span class="visually-hidden">Loading...</span>
                        </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <button class="btn btn-danger btn-icon" wire:loading.attr="disabled">
        <div class="spinner-border spinner-border-sm text-light" role="status" wire:loading>
            <span class="visually-hidden">Loading...</span>
        </div>
        <i class="bx bx-reset" wire:loading.remove></i>
    </button> --}}
</div>

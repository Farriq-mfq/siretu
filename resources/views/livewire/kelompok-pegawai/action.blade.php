<div>
    <button type="button" class="btn btn-danger btn-icon" wire:loading.attr="disabled" wire:click.prevent="handleDelete">
        <i class="bx bx-trash"></i>

    </button>
    {{-- <button type="button" class="btn btn-danger btn-icon" data-bs-toggle="modal" data-bs-target="#btn-remove-kelompok-peg">
        <i class="bx bx-trash"></i>

    </button> --}}
    {{-- <div class="modal fade" id="btn-remove-kelompok-peg" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <p>Yakin ingin menghapus data ini ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button class="btn btn-danger" wire:loading.attr="disabled" wire:click.prevent="handleDelete">
                        <span wire:loading.remove>Iya</span>
                        <div wire:loading class="spinner-border spinner-border-sm text-default" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div> --}}
</div>

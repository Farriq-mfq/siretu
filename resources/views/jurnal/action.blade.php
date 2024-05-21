<div class="d-grid gap-2">
    <a href="{{ route('jurnal.detail', ['tanggal' => urlencode($TglFormulir), 'personil' => $NoTelp]) }}" type="button"
        class="btn btn-primary btn-sm d-flex">
        <i class="bx bx-chevron-right"></i> Detail
    </a>
    @livewire('jurnal.button-print', ['personil' => $NoTelp, 'tanggal' => $TglFormulir])
</div>

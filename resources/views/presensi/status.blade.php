@if ($row->JAM_DATANG && $row->JAM_PULANG)
    <span class="badge bg-success">
        Lengkap
    </span>
@else
    <span class="badge bg-danger">
        Belum Lengkap
    </span>
@endif

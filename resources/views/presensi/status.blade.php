@if ($row->DATANG && $row->PULANG)
    <span class="badge bg-success">
        Lengkap
    </span>
@else
    <span class="badge bg-danger">
        Belum Lengkap
    </span>
@endif

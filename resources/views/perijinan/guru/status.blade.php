@if ($row->approve)
    <span class="badge bg-success">
        Diijinkan <i class="bx bx-check"></i>
    </span>
@else
    <span class="badge bg-danger">
        Belum Diijinkan <i class="bx bx-x"></i>
    </span>
@endif

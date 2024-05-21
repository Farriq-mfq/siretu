@if ($row->approve)
    <h6 class="mb-0 text-success">
        Di Ijinkan <i class="bx bx-check"></i>
    </h6>
@else
    <h6 class="mb-0 text-danger">
        Belum Diijinkan <i class="bx bx-x"></i>
    </h6>
@endif

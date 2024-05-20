<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">5 Presensi Hari ini</h5>
            </div>
            <div class="card-body pb-0 mt-2">
                @if ($presensi->count())
                    <ul class="p-0 m-0">
                        @foreach ($presensi as $p)
                            <li class="d-flex mb-4 pb-1">
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">
                                            {{ $p->NAMALENGKAP }}
                                        </small>
                                        <h6 class="mb-0">
                                            {{ $p->JAM_DATANG }} - @if ($p->JAM_PULANG)
                                                <span class="text-danger">{{ $p->JAM_PULANG }}</span>
                                            @else
                                                -
                                            @endif
                                        </h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        @if ($p->JAM_DATANG && $p->JAM_PULANG)
                                            <h6 class="mb-0 text-success">
                                                Lengkap
                                            </h6>
                                        @else
                                            <h6 class="mb-0 text-danger">
                                                Belum Lengkap
                                            </h6>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="p-0 mb-2 text-center">
                        Belum ada presensi hari ini
                    </div>
                @endif
            </div>
            <div class="card-footer p-2 border-top">
                <a href="{{ route('presensi') }}" class="fs-6 text-center d-block">Lihat data<i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">5 Jurnal Hari ini</h5>
            </div>
            <div class="card-body pb-0 mt-2">
                @if ($jurnal->count())
                    <ul class="p-0 m-0">
                        @foreach ($jurnal as $j)
                            <li class="d-flex mb-4 pb-1">
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">
                                            {{ $j->NAMALENGKAP }}
                                        </small>
                                        <h6 class="mb-0">
                                            {{ $j->TglFormulir }} - {{ $j->ROMBEL_MAPEL }}
                                        </h6>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="p-0 mb-2 text-center">
                        Belum ada jurnal hari ini
                    </div>
                @endif
            </div>
            <div class="card-footer p-2 border-top">
                <a href="{{ route('jurnal') }}" class="fs-6 text-center d-block">Lihat data<i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">5 Ijin Guru Hari ini</h5>
            </div>
            <div class="card-body pb-0 mt-2">
                @if ($ijinGuru->count())
                    <ul class="p-0 m-0">
                        @foreach ($ijinGuru as $i)
                            <li class="d-flex mb-4 pb-1">
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">
                                            {{ $i->NAMALENGKAP }}
                                        </small>
                                        <h6 class="mb-0">
                                            {{ $i->JENISIJIN }}
                                        </h6>
                                        <h6 class="mb-0 mt-1">
                                            {{ $i->TGLIJIN }} - {{ $i->TGLIJIN2 }}
                                        </h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        @if ($i->approve)
                                            <h6 class="mb-0 text-success">
                                                Di Ijinkan <i class="bx bx-check"></i>
                                            </h6>
                                        @else
                                            <h6 class="mb-0 text-danger">
                                                Belum Diijinkan <i class="bx bx-x"></i>
                                            </h6>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="p-0 mb-2 text-center">
                        Belum ada ijin guru hari ini
                    </div>
                @endif
            </div>
            <div class="card-footer p-2 border-top">
                <a href="{{ route('presensi') }}" class="fs-6 text-center d-block">Lihat data<i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>

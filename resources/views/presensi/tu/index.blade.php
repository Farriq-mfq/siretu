@extends('templates.main')
@section('title')
    Data Presensi Tata usaha
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="{{ route('presensi-tu', ['show' => 'current']) }}"
                            class="nav-link @if ($by === 'current') active @endif"
                            aria-selected="@if ($by === 'current') true @endif">
                            Presensi hari ini
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('presensi-tu', ['show' => 'all']) }}"
                            class="nav-link @if ($by === 'all') active @endif"
                            aria-selected="@if ($by === 'all') active @endif">
                            Semua Presensi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('presensi-tu', ['show' => 'filter']) }}"
                            class="nav-link @if ($by === 'filter') active @endif"
                            aria-selected="@if ($by === 'filter') active @endif">
                            Filter
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    @if ($by === 'current')
                        <div class="tab-pane fade show active">
                            {{ $dataTable->table() }}
                        </div>
                    @endif
                    @if ($by === 'all')
                        <div class="tab-pane fade show active">
                            {{ $dataTable->table() }}
                        </div>
                    @endif
                    @if ($by === 'filter')
                        <div class="tab-pane fade show active">
                            <button class="btn btn-primary" id="btn-show-filter-tu">
                                Tampilkan filter tanggal
                            </button>
                            <form class="row" method="GET">
                                <div id="filter-range-tu" class="row mt-2" style="display: none">
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            Tanggal awal
                                        </label>
                                        <input type="date" class="form-control" name="start" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            Tanggal akhir
                                        </label>
                                        <input type="date" class="form-control" name="end" />
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label class="form-label">
                                        Pilih personil
                                    </label>
                                    <select name="" id="" placeholder="" class="form-control">
                                        <option value="">--Pilih Personil--</option>
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-primary">
                                        <i class="bx bx-filter"></i>
                                        Tampilkan
                                    </button>
                                </div>
                            </form>
                            {{-- <div class="mt-3">
                                {{ $dataTable->table() }}
                            </div> --}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        $("#btn-show-filter-tu").on('click', function(e) {
            e.preventDefault()
            $("#filter-range-tu").fadeToggle()
        })
    </script>
@endpush

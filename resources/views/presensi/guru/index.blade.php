@extends('templates.main')
@section('title')
    Data Presensi Guru
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="{{ route('presensi-guru', ['show' => 'current']) }}"
                            class="nav-link @if ($by === 'current') active @endif"
                            aria-selected="@if ($by === 'current') true @endif">
                            Presensi hari ini
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('presensi-guru', ['show' => 'all']) }}"
                            class="nav-link @if ($by === 'all') active @endif"
                            aria-selected="@if ($by === 'all') active @endif">
                            Semua Presensi
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
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush

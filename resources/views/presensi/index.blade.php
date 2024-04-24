@extends('templates.main')
@section('title')
    Data Presensi
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="{{ route('presensi', ['show' => 'current']) }}"
                            class="nav-link @if ($by === 'current') active @endif"
                            aria-selected="@if ($by === 'current') true @endif">
                            Presensi hari ini
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('presensi', ['show' => 'all']) }}"
                            class="nav-link @if ($by === 'all') active @endif"
                            aria-selected="@if ($by === 'all') active @endif">
                            Semua Presensi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('presensi', ['show' => 'filter']) }}"
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
                            <livewire:filter-presensi :filter="$filter" :personil="$personil" />
                            @if ($filter['personil'] || ($filter['start_date'] && $filter['end_date']))
                                <div class="mt-3">
                                    {{ $dataTable->table() }}
                                </div>
                            @endif
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

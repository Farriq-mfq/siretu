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
                        <a href="{{ route('presensi', ['show' => 'current']) }}"class="nav-link">
                            Presensi hari ini
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('presensi.notyet') }}" class="nav-link active">
                            Belum Presensi hari ini
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('presensi', ['show' => 'all']) }}" class="nav-link">
                            Semua Presensi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('presensi', ['show' => 'filter']) }}" class="nav-link">
                            Filter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('presensi', ['show' => 'recap']) }}" class="nav-link">
                            Rekap
                        </a>
                    </li>
                </ul>
                <div class="tab-content active">
                    <div class="mb-4">
                        @livewire('presensi.form-warn')
                    </div>
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
    {{ $dataTable->scripts() }}
@endsection

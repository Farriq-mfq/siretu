@extends('templates.main')
@section('title', 'Import Kelas')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('kelas') }}">Kembali</a>
            <a download href="{{ route('kelas-format-download') }}" class="btn btn-primary btn-sm d-block mt-2"
                style="width: fit-content">Download format</a>
        </div>
        <div class="card-body">
            @livewire('kelas.import')
        </div>
    </div>
@endsection

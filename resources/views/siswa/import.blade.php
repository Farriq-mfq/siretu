@extends('templates.main')
@section('title', 'Import Siswa')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('siswa') }}">Kembali</a>
            <a download href="{{ route('personil-format-download') }}" class="btn btn-primary btn-sm d-block mt-2"
                style="width: fit-content">Download format</a>
        </div>
        <div class="card-body">
            @livewire('siswa.import')
        </div>
    </div>
@endsection

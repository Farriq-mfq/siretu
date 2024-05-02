@extends('templates.main')
@section('title', 'Import personil')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('personil') }}">Kembali</a>
            <a download href="{{ route('personil-format-download') }}" class="btn btn-primary btn-sm d-block mt-2"
                style="width: fit-content">Download format</a>
        </div>
        <div class="card-body">
            @livewire('personil.import')
        </div>
    </div>
@endsection

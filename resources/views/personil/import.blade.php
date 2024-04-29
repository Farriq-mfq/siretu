@extends('templates.main')
@section('title', 'Import personil')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('personil') }}">Kembali</a>
            <a href="" class="btn btn-primary btn-sm d-block mt-2" style="width: fit-content">Download format</a>
        </div>
        <div class="card-body">
            @livewire('import-personil')
        </div>
    </div>
@endsection

@extends('templates.main')
@section('title', 'Tambah personil')
@section('content')
    <div class="card">
        <div class="card-header">
            {{-- <h2 class="card-title">
                Tambah personil
            </h2> --}}
            <a href="{{ route('personil') }}">Kembali</a>
        </div>
        <div class="card-body">
            @livewire('add-personil')
        </div>
    </div>
@endsection

@extends('templates.main')
@section('title', 'Tambah personil')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('personil') }}">Kembali</a>
        </div>
        <div class="card-body">
            @livewire('personil.edit', compact('personil'))
        </div>
    </div>
@endsection

@extends('templates.main')
@section('title', 'Reset data siswa')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('siswa') }}">Kembali</a>
            <p class="card-description mt-3">
                Yakin ingin reset semua data siswa ?
            </p>
        </div>
        <div class="card-body">
            @livewire('siswa.reset')
        </div>
    </div>
@endsection

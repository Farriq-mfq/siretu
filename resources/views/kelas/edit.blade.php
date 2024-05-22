@extends('templates.main')
@section('title', 'Tambah kelas')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('kelas') }}">Kembali</a>
        </div>
        <div class="card-body">
            @livewire('kelas.edit', ['kelas' => $findKelas])
        </div>
    </div>
@endsection

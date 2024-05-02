@extends('templates.main')
@section('title', 'Kelompok pegawai')
@section('content')
    <div class="card">
        <div class="card-header">
            @livewire('kelompok-pegawai.add')
        </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endsection

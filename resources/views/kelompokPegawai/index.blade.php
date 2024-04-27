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
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

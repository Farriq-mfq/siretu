@extends('templates.main')
@section('title', 'Siswa')
@section('content')
    <div class="card">
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
    {{ $dataTable->scripts() }}
@endsection

@extends('templates.main')
@section('title')
    WIFI
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <livewire:wifi.form />
        </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
    {{ $dataTable->scripts() }}
@endsection

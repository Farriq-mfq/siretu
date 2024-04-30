@extends('templates.main')
@section('title')
    WIFI
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <livewire:form-wifi />
        </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
    {{ $dataTable->scripts() }}
@endsection

@extends('templates.main')
@section('title')
    Data Personil
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
    {{ $dataTable->scripts() }}
@endsection

{{-- @push('scripts')
    {{ $dataTable->scripts() }}
@endpush --}}

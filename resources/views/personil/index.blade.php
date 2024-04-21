@extends('templates.main')
@section('title')
    Data Personil
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">
                Personil
            </h2>
            <p class="card-description">
                Ini data personil
            </p>
        </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush

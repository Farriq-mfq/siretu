@extends('templates.new')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">
                Halo
            </h2>
        </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts() }}
@endpush

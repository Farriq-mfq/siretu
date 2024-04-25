@extends('templates.main')
@section('title')
    Data Personil
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('personil-create') }}" type="button" class="btn btn-primary">
                <span class="tf-icons bx bx-plus"></span>&nbsp; Tambah Personil
            </a>
        </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush

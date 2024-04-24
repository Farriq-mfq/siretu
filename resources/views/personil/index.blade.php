@extends('templates.main')
@section('title')
    Data Personil
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary">
                <span class="tf-icons bx bx-cloud"></span>&nbsp; Sinkronkan dengan dapodik
            </button>
        </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush

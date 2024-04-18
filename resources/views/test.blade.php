@extends('templates.main')
@section('content')
<x-base-content title="Data personil">
    {{ $dataTable->table() }}
</x-base-content>
@endsection
@push('scripts')
    {{ $dataTable->scripts() }}
@endpush

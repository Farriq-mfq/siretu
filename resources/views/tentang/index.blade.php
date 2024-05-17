@extends('templates.main')
@section('title')
    Tentang
@endsection
@section('content')
    <div class="card">
        {{-- <div class="card-header">

        </div> --}}
        <div class="card-body">
            <p>
                &copy;Farriqmfq
                Versi aplikasi {{ env('APP_VERSION') }}
            </p>
        </div>
    </div>
@endsection

@extends('templates.main')
@section('title')
    Tentang
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <p>
                &copy; Made with 😊 by Farriqmfq
            </p>
        </div>
        <div class="card-footer">
            Versi aplikasi {{ env('APP_VERSION') }}
        </div>
    </div>
@endsection

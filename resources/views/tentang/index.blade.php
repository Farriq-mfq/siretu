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
                &copy; TIM IT SMK Negeri 1 Pekalongan
                Versi aplikasi {{ env('APP_VERSION') }}
            </p>
        </div>
    </div>
@endsection

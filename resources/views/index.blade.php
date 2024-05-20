@extends('templates.main')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            @livewire('dashboard.stats')
        </div>
        <hr>
        <div class="col-md-12">
            @livewire('dashboard.current')
        </div>
    </div>
@endsection

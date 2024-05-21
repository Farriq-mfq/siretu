@extends('templates.main')
@section('title', 'Setting')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                @livewire('setting.clear-sesi-chat')
                @livewire('setting.clear-outbox-chat')
            </table>
        </div>
    </div>
@endsection

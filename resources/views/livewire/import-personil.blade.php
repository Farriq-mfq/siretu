@extends('templates.main')
@section('title', 'Import personil')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('personil') }}">Kembali</a>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="handleImport" method="POST" enctype="multipart/form-data">
                <div>
                    <input wire:model="file" type="file" class="form-control" accept=".xlsx,.xls">
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit">
                        Import
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

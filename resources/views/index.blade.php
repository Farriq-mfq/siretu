@extends('templates.main')
@section('title')
    Dashboard
@endsection
@section('content')
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a href="{{ route('dashboard', ['tab' => 'statistik']) }}"
                class="nav-link @if ($currentTab === 'statistik') active @endif" role="tab"
                aria-selected="@if ($currentTab === 'statistik') true @else false @endif">
                Statistik
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dashboard', ['tab' => 'grafik']) }}"
                class="nav-link @if ($currentTab === 'grafik') active @endif" role="tab"
                aria-selected="@if ($currentTab === 'grafik') true @else false @endif">
                Grafik
            </a>
        </li>
    </ul>
    <div class="tab-content px-0">
        <div class="tab-pane fade @if ($currentTab === 'statistik') show active @endif" role="tabpanel">
            <div class="row">
                <div class="col-md-12">
                    @livewire('dashboard.stats')
                </div>
                <hr>
                <div class="col-md-12">
                    @livewire('dashboard.current')
                </div>
            </div>
        </div>
        <div class="tab-pane @if ($currentTab === 'grafik') show active @endif" role="tabpanel">
            {{-- <x-under-dev></x-under-dev> --}}

            <div class="card">
                <div class="card-body">
                    <livewire:livewire-line-chart {{-- key="{{ $columnChartModel->reactiveKey() }}" --}} :column-chart-model="$columnChartModel" />
                </div>
            </div>
        </div>
    </div>
@endsection

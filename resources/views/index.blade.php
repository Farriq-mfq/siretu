@extends('templates.main')
@section('content')
    <div class="space-y-4">
        <div class="grid lg:grid-cols-4 gap-4">
            <x-stats title="Total Personil" value="{{ $personil }}" icon="users"></x-stats>
            <x-stats title="Total Data Presensi TU" value="{{ $presensi_tu }}" icon="notebook-text"></x-stats>
            <x-stats title="Total Data Presensi Guru" value="{{ $presensi_guru }}" icon="book-text"></x-stats>
            <x-stats title="Total Data Jurnal" value="{{ $jurnal }}" icon="list"></x-stats>
        </div>
        <div class="grid lg:grid-cols-2 gap-4">
            <x-base-content title="Sudah Presensi Hari ini ( TU )" description="Data yang sudah presensi hari ini" customClass="h-fit">
                <a href="{{ route('presensi-tu') }}"
                    class="mb-5 text-blue-500 text-center inline-block text-sm underline">Lihat data lengkap</a>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs uppercase bg-blue-500 text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-nowrap rounded-l-lg">Nama </th>
                                <th scope="col" class="px-6 py-3 text-nowrap rounded-l-lg">No Telp</th>
                                <th scope="col" class="px-6 py-3 text-nowrap rounded-l-lg">Kondisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($current_presences_tu->count() > 0)
                                @foreach ($current_presences_tu as $presences_tu)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td scope="row" class="px-6 py-4 text-nowrap">
                                            {{ $presences_tu->NAMALENGKAP }}
                                        </td>
                                        <td scope="row" class="px-6 py-4 text-nowrap">
                                            {{ $presences_tu->NoTelp }}
                                        </td>
                                        <td scope="row" class="px-6 py-4 text-nowrap">
                                            {{ $presences_tu->KONDISI }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="12" class="text-center py-5">
                                        Belum ada yang presensi
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </x-base-content>
            <x-base-content title="Grafik Presensi (TU)" description="Visualisasi data presensi" customClass="h-fit">
                @if ($current_presences_tu->count() > 0)
                    <div class="grid lg:grid-cols-2">
                        <div class="h-full w-full">
                            <canvas id="presensi-tu-visualisasi-1"></canvas>
                        </div>
                        <div class="h-full w-full">
                            <canvas id="presensi-tu-visualisasi-2"></canvas>
                        </div>
                    </div>
                @else
                    <p class="text-sm text-center text-gray-700">Data Belum Lengkap untuk di visualisasi</p>
                @endif
            </x-base-content>
        </div>
    </div>

@endsection
@push('scripts')
    <script type="module">
        $(document).ready(function() {

            new Chart(
                document.getElementById('presensi-tu-visualisasi-1'), {
                    type: 'doughnut',
                    options: {
                        responsive: true
                    },
                    data: {
                        labels: ["Lengkap", "Belum Lengkap"],
                        datasets: [{
                            label: 'Presensi TU',
                            data: [{{ $stats_presences_tu['completed'] }},
                                {{ $stats_presences_tu['uncompleted'] }}
                            ]
                        }]
                    }
                }
            );
            new Chart(
                document.getElementById('presensi-tu-visualisasi-2'), {
                    type: 'pie',
                    options: {
                        responsive: true
                    },
                    data: {
                        labels: ["Sehat dan bahagia", "Sakit", "Tanpa Keterangan"],
                        datasets: [{
                            backgroundColor: ['#91C483', '#EEEEEE', '#FF6464'],
                            label: 'Presensi TU (Kondisi)',
                            fill: true,
                            data: [{{ $stats_presences_tu['0'] }}, {{ $stats_presences_tu['1'] }},
                                {{ $stats_presences_tu['2'] }}
                            ]
                        }]
                    }
                }
            );

        });
    </script>
@endpush

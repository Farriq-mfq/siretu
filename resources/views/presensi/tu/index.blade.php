@extends('templates.main')
@section('title')
    Data Presensi TU
@endsection
@section('content')
    <x-base-content title="Data Presensi Staff TU" description="Data hasil presensi menggunakan wa">
        @if (Session::has('message'))
            <x-alert></x-alert>
        @endif
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                data-tabs-toggle="#tab---presences--tu" role="tablist">
                <li class="me-2" role="presentation">
                    <button id="tab__presence__tu" class="inline-block p-4 border-b-2 rounded-t-lg" id="data-tab"
                        data-tabs-target="#Data" type="button" role="tab" aria-controls="Data"
                        aria-selected="{{ $tab === 'Data' ? 'true' : 'false' }}">Data</button>
                </li>
                <li class="me-2" role="presentation">
                    <button id="tab__presence__tu" class="inline-block p-4 border-b-2 rounded-t-lg" id="stats-tab"
                        data-tabs-target="#stats" type="button" role="tab" aria-controls="stats"
                        aria-selected="{{ $tab === 'stats' ? 'true' : 'false' }}">Statistik</button>
                </li>
            </ul>
        </div>
        {{-- filter data --}}
        <form method="GET" class="space-y-2 mb-4">
            <div class="grid grid-cols-2 gap-2">
                <input type="hidden" value="{{ $filter['show'] != 'current' ? $filter['show'] : 'all' }}" name="show">
                <div>
                    <input value="{{ $filter['first_date'] ?? '' }}" type="date" id="first_date" name="first_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukan tanggal pertama" required />
                </div>
                <div>
                    <input value="{{ $filter['last_date'] ?? '' }}" id="last_date" name="last_date" type="date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukan tanggal terakhir" required />
                </div>
            </div>
            <div class="flex items-center gap-0.5">
                <button type="submit"
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800 flex items-center">
                    <i data-lucide="filter" class="mr-2 w-4 h-4"></i> Filter
                </button>
            </div>
        </form>

        <div class="max-w-sm mb-3">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Tampilkan
            </label>
            <select id="change_show_rek_tu"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option @if ($show === 'current') selected @endif value="current">Data Hari Ini</option>
                <option @if ($show === 'all') selected @endif value="all">Semua Data</option>
                <option @if ($show === 'completed') selected @endif value="completed">Lengkap</option>
                <option @if ($show === 'uncompleted') selected @endif value="uncompleted">Belum Lengkap</option>
            </select>
        </div>
        {{-- <div class="max-w-sm">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Cari Personil
            </label>
            <select class="w-full" id="select2" name="state">
                <option value="AL">Alabama</option>
                <option value="WY">Wyoming</option>
            </select>
        </div> --}}


        <div class="flex gap-1">
            <a href={{ route('presensi-tu-export', array_merge($filter, ['type' => 'excel'])) }} target="_blank" z
                class="w-fit text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800 flex items-center">
                <i data-lucide="file-down" class="mr-2 w-4 h-4"></i> Export ke excel
            </a>
            <a href={{ route('presensi-tu-export', array_merge($filter, ['type' => 'pdf'])) }} target="_blank" z
                class="w-fit text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800 flex items-center">
                <i data-lucide="printer" class="mr-2 w-4 h-4"></i> Cetak
            </a>
        </div>



        <form class="max-w-md my-3">
            <div class="flex gap-2">
                <input type="hidden" value="{{ $filter['show'] }}" name="show">
                <input name="search" value="{{ $filter['search'] }}" type="search" id="default-search"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Cari data" required />
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>

        <div>
            @if ($filter['search'] || ($filter['first_date'] && $filter['last_date']))
                <a href="{{ route('presensi-tu') }}"
                    class="text-white w-fit bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 flex items-center">
                    <i data-lucide="x" class="mr-2 w-4 h-4"></i> Reset
                </a>
            @endif
        </div>


        <div id="tab---presences--tu">
            <div class="hidden mt-1 rounded-lg" id="Data" role="tabpanel" aria-labelledby="data-tab">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs uppercase bg-blue-500 text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-nowrap rounded-l-lg">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-nowrap rounded-l-lg">
                                    NoFormulir
                                </th>
                                <th scope="col" class="px-6 py-3 text-nowrap">
                                    Tanggal Formulir
                                </th>
                                <th scope="col" class="px-6 py-3 text-nowrap">
                                    Nama Lengkap
                                </th>
                                <th scope="col" class="px-6 py-3 text-nowrap">
                                    No Telp
                                </th>
                                <th scope="col" class="px-6 py-3 text-nowrap">
                                    Kondisi
                                </th>
                                <th scope="col" class="px-6 py-3 text-nowrap">
                                    Datang
                                </th>
                                <th scope="col" class="px-6 py-3 text-nowrap">
                                    Jarak Datang
                                </th>
                                <th scope="col" class="px-6 py-3 text-nowrap">
                                    Jam Datang
                                </th>
                                <th scope="col" class="px-6 py-3 text-nowrap">
                                    Pulang
                                </th>
                                <th scope="col" class="px-6 py-3 text-nowrap">
                                    Jarak Pulang
                                </th>
                                <th scope="col" class="px-6 py-3 text-nowrap">
                                    Jam Pulang
                                </th>
                                <th scope="col" class="px-6 py-3 text-nowrap">
                                    Aktifitas yang di lakukan
                                </th>
                                <th scope="col" class="px-6 py-3 text-nowrap">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($presences->count() > 0)
                                @foreach ($presences as $presence)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 text-nowrap">
                                            @if ($presence->DATANG && $presence->PULANG)
                                                <span
                                                    class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-blue-300">
                                                    Lengkap
                                                </span>
                                            @else
                                                <span
                                                    class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-blue-300">
                                                    Belum Lengkap
                                                </span>
                                            @endif
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 text-nowrap font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $presence->NoFormulir }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 text-nowrap font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $presence->TglFormulir }}
                                        </th>
                                        <td class="px-6 py-4 text-nowrap">
                                            {{ $presence->NAMALENGKAP }}
                                        </td>
                                        <td class="px-6 py-4 text-nowrap">
                                            {{ $presence->NoTelp }}
                                        </td>
                                        <td class="px-6 py-4 text-nowrap">
                                            {{ $presence->KONDISI }}
                                        </td>
                                        <td class="px-6 py-4 text-nowrap">
                                            @if ($presence->PULANG)
                                                <a class="text-blue-500" target="_blank"
                                                    href={{ $presence->DATANG }}>Link
                                                    Google Maps
                                                    Datang</a>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-nowrap">
                                            {{ $presence->JARAK_DATANG }}
                                        </td>
                                        <td class="px-6 py-4 text-nowrap">
                                            {{ $presence->JAM_DATANG }}
                                        </td>
                                        <td class="px-6 py-4 text-nowrap">
                                            @if ($presence->PULANG)
                                                <a class="text-blue-500" target="_blank"
                                                    href={{ $presence->PULANG }}>Link
                                                    Google Maps
                                                    Pulang</a>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-nowrap">
                                            {{ $presence->JARAK_PULANG }}
                                        </td>
                                        <td class="px-6 py-4 text-nowrap">
                                            {{ $presence->JAM_PULANG }}
                                        </td>
                                        <td class="px-6 py-4 text-nowrap">
                                            {{ $presence->AKTIFITAS }}
                                        </td>
                                        <td class="px-6 py-4 text-nowrap">
                                            <div>
                                                <button data-modal-target="confirmation-modal"
                                                    data-modal-toggle="confirmation-modal" type="submit"
                                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                    <i data-lucide="trash" class="h-4 w-4"></i>
                                                    <span class="sr-only">Icon description</span>
                                                </button>

                                                <div id="confirmation-modal" tabindex="-1"
                                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button"
                                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                data-modal-hide="confirmation-modal">
                                                                <i data-lucide="x" class="h-4 w-4"></i>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <div class="p-4 md:p-5 text-center">
                                                                <i data-lucide="circle-alert"
                                                                    class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"></i>
                                                                <h3
                                                                    class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                                    Yakin ingin mereset data ini ?</h3>
                                                                <form
                                                                    action="{{ route('presensi-tu-reset', ['id' => $presence->NoFormulir]) }}"
                                                                    method="POST" class="inline-block">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                        Iya
                                                                    </button>
                                                                </form>
                                                                <button data-modal-hide="confirmation-modal"
                                                                    type="button"
                                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                                    Batal</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="12" class="text-center py-5">
                                        Data belum tersedia
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                @if ($presences->count() > 0)
                    <div class="mt-4">
                        {{ $presences->links() }}
                    </div>
                @endif
            </div>
        </div>
        <div id="tab---presences--tu">
            <div class="hidden p-4" id="stats" role="tabpanel" aria-labelledby="data-tab">
                @if ($presences->count() > 0)
                    <div class="flex gap-2 items-center">
                        <div class="shadow rounded  p-3 mb-4 flex h-[250px] w-[250px]">
                            <canvas id="presensi-visualisasi"></canvas>
                        </div>
                        <div class="flex-1">
                            <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-40">
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="col" class="px-6 py-3">Total Data Lengkap</th>
                                        <td>{{ $presences_count['lengkap'] }}</td>
                                    </tr>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="col" class="px-6 py-3">Total Data Belum Lengkap</th>
                                        <td>{{ $presences_count['belum_lengkap'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <p class="text-sm flex items-center">
                        <i data-lucide="info" class="mr-2"></i>
                        Data Belum mencukupi untuk menampilkan grafik
                    </p>
                @endif
            </div>
        </div>
    </x-base-content>
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $("#change_show_rek_tu").on("change", function(e) {
                const show_var = $(this).val()
                const urlParams = new URLSearchParams(window.location.search);
                if (urlParams.has('show')) {
                    urlParams.delete('show');
                    urlParams.delete('page')
                }
                const queryParams = `?${urlParams.toString()}`;
                if (show_var === 'current') {
                    window.location.href = `{!! route('presensi-tu') !!}?show=${show_var}`
                } else {
                    window.location.href = `{!! route('presensi-tu') !!}${queryParams}&show=${show_var}`
                }
            })

            $(document).on("click", "#tab__presence__tu", function() {
                const button = $(this)
                const tabId = button.attr("aria-controls")
                const urlParams = new URLSearchParams(window.location.search);
                urlParams.set('tab', tabId);
                const queryParams = `?${urlParams.toString()}`;
                window.history.pushState(null, null, queryParams);
            })


            const data = [{
                title: "Lengkap",
                count: {{ $presences_count['lengkap'] }}
            }, {
                title: "Belum Lengkap",
                count: {{ $presences_count['belum_lengkap'] }}
            }];

            new Chart(
                document.getElementById('presensi-visualisasi'), {
                    type: 'doughnut',
                    options: {
                        responsive: true
                    },
                    data: {
                        labels: data.map(row => row.title),
                        datasets: [{
                            label: 'Presensi TU',
                            data: data.map(row => row.count)
                        }]
                    }
                }
            );

        });
    </script>
@endpush

@extends('templates.main')
@section('title')
    Data Personil
@endsection
@section('content')
    <x-base-content title="Personil" description="Menampilkan data personil">
        <div class="flex gap-1">
            <a href={{ route('export-personil', ['type' => 'excel']) }} target="_blank" z
                class="w-fit text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800 flex items-center">
                <i data-lucide="file-down" class="mr-2 w-4 h-4"></i> Export ke excel
            </a>
            <a href={{ route('export-personil', ['type' => 'pdf']) }} target="_blank" z
                class="w-fit text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800 flex items-center">
                <i data-lucide="printer" class="mr-2 w-4 h-4"></i> Cetak
            </a>
        </div>
        <form class="max-w-md my-3">
            <div class="flex gap-2">
                <input autocomplete="off" @if ($search) autofocus @endif name="search" value="{{ $search }}"
                    type="search" id="default-search"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Cari data" required />
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
        <div>
            @if ($search)
                <a href="{{ route('personil') }}"
                    class="text-white w-fit bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 flex items-center">
                    <i data-lucide="x" class="mr-2 w-4 h-4"></i> Reset
                </a>
            @endif
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs uppercase bg-blue-500 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-nowrap rounded-l-lg">
                            Nomor
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap rounded-l-lg">
                            NoTelp
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap">
                            Kelompok
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap">
                            Nama Saja
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap">
                            Jabatan
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap">
                            Nama Lengkap
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap">
                            Jenis Kelamin
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap">
                            Panggilan
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap">
                            No Induk
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap">
                            Email
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($personils->count() > 0)
                        @foreach ($personils as $personil)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 text-nowrap font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $personil->NOMOR }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 text-nowrap font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $personil->NOTELP }}
                                </th>
                                <td class="px-6 py-4 text-nowrap">
                                    {{ $personil->KELOMPOKGURU }}
                                </td>
                                <td class="px-6 py-4 text-nowrap">
                                    {{ $personil->NAMASAJA }}
                                </td>
                                <td class="px-6 py-4 text-nowrap">
                                    {{ $personil->JABATAN }}
                                </td>
                                <td class="px-6 py-4 text-nowrap">
                                    {{ $personil->NAMALENGKAP }}
                                </td>
                                <td class="px-6 py-4 text-nowrap">
                                    {{ $personil->KELAMIN }}
                                </td>
                                <td class="px-6 py-4 text-nowrap">
                                    {{ $personil->PANGGILAN }}
                                </td>
                                <td class="px-6 py-4 text-nowrap">
                                    {{ $personil->STATUS }}
                                </td>
                                <td class="px-6 py-4 text-nowrap">
                                    {{ $personil->INDUKPEGAWAI }}
                                </td>
                                <td class="px-6 py-4 text-nowrap">
                                    {{ $personil->EMAIL }}
                                </td>
                                {{-- <td class="px-6 py-4 text-nowrap">
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
                                                            action="{{ route('presensi-tu-reset', ['id' => $personil->NoFormulir]) }}"
                                                            method="POST" class="inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                Iya
                                                            </button>
                                                        </form>
                                                        <button data-modal-hide="confirmation-modal" type="button"
                                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                            Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </td> --}}
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
        @if ($personils->count() > 0)
            <div class="mt-4">
                {{ $personils->links() }}
            </div>
        @endif
    </x-base-content>
@endsection

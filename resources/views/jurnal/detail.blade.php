@extends('templates.main')
@section('title', 'Detail Jurnal')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('jurnal') }}" class="mb-3 d-block">Kembali</a>
            <h2 class="card-title">
                {{ $jurnal->NAMALENGKAP }}
            </h2>
            <p class="text-muted">
                {{ $jurnal->ROMBEL_MAPEL }}
            </p>
        </div>
        <div class="card-body">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td class="align-middle"><small class="text-light fw-semibold">
                                Tanggal KBM
                            </small></td>
                        <td class="py-3">
                            <p class="mb-0">
                                {{ $jurnal->TglFormulir }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle"><small class="text-light fw-semibold">
                                Jam</small></td>
                        <td class="py-4">
                            <p class="lead mb-0">
                                {{ $jurnal->MULAI }} - {{ $jurnal->SELESAI }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle"><small class="text-light fw-semibold">Uraian Kegiatan</small></td>
                        <td class="py-4">
                            <p class="lead mb-0">
                                {{ $jurnal->URAIAN_KEGIATAN }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle"><small class="text-light fw-semibold">Keterangan</small></td>
                        <td class="py-4">
                            <p class="lead mb-0">
                                {{ $jurnal->KETERANGAN }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle"><small class="text-light fw-semibold">Ijin</small></td>
                        <td class="py-4">
                            <p class="lead mb-0">
                                {{ $jurnal->IJIN ?? '-' }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle"><small class="text-light fw-semibold">Sakit</small></td>
                        <td class="py-4">
                            <p class="lead mb-0">
                                {{ $jurnal->SAKIT ?? '-' }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle"><small class="text-light fw-semibold">Alpha</small></td>
                        <td class="py-4">
                            <p class="lead mb-0">
                                {{ $jurnal->ALPHA ?? '-' }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle"><small class="text-light fw-semibold">Dispen</small></td>
                        <td class="py-4">
                            <p class="lead mb-0">
                                {{ $jurnal->DISPEN ?? '-' }}
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @livewire('jurnal.button-print', ['personil' => $jurnal->NoTelp, 'tanggal' => $jurnal->TglFormulir])
        </div>
    </div>
@endsection

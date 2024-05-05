<div>
    <form method="POST" wire:submit.prevent="getAllPresensi">
        <div>
            <select wire:model="year" class="form-control @error('year') is-invalid @enderror">
                <option value="">--PILIH TAHUN--</option>
                @foreach ($years as $year)
                    <option value="{{ $year->year }}">
                        {{ $year->year }}
                    </option>
                @endforeach
            </select>
            @error('year')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- <div class="mt-3">
            <select wire:model="month" class="form-control">
                <option value="">--PILIH Bulan--</option>
                @foreach ($months as $key => $month)
                    <option value="{{ $key }}">
                        {{ $month }}
                    </option>
                @endforeach
            </select>
        </div> --}}
        <div class="mt-3">
            <button class="btn btn-primary">
                <span wire:loading.remove wire:target="getAllPresensi">Lihat Rekap</span>
                <span wire:loading wire:target="getAllPresensi">Loading...</span>
            </button>
        </div>
    </form>

    @if ($recap)
        <button wire:click.prevent="exportRecap" class="mt-5 btn btn-primary" wire:loading.attr="disabled"
            wire:target="exportRecap">
            <span wire:loading.remove wire:target="exportRecap">Download Rekap Laporan</span>
            <span wire:loading wire:target="exportRecap">Downloading...</span>
        </button>
        {{-- @if ($year && $month)
            <p>lro</p>
        @else --}}
        <div class="d-grid gap-5 mt-5">
            @foreach ($recap as $r)
                @if (current($r)['data'])
                    <h1>
                        {{ array_keys($r)[0] }}
                    </h1>
                    <table style="width: 100%;border: 1px solid #000">
                        <thead>
                            <tr>
                                <td rowspan="2" style="width: 50px;text-align: center;border:1px solid #000">NO</td>
                                <td rowspan="2" style="padding-left: 3px;border:1px solid #000">NAMA</td>
                                <td colspan="{{ current($r)['total_days'] }}"
                                    style="text-align:center;border:1px solid #000">Tanggal</td>
                                <th colspan="3" style="text-align: center;border:1px solid #000">Total</th>
                            </tr>
                            <tr>
                                @for ($i = 1; $i <= current($r)['total_days']; $i++)
                                    <th style="text-align:center">{{ $i }}</th>
                                @endfor
                                <th
                                    style="text-align: center;width: 50px;border:1px solid #000;background:green;color:white">
                                </th>
                                <th style="text-align: center;width: 50px;border:1px solid #000;;background:yellow">
                                </th>
                                <th style="text-align: center;width: 50px;border:1px solid #000">
                                </th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach (current($r)['data'] as $name => $item)
                                <tr>
                                    <td style="text-align: center;border:1px solid #000">{{ $loop->iteration }}</td>
                                    <td style="width: 300px;padding-left: 3px;border:1px solid #000">
                                        {{ $name }}
                                    </td>
                                    @foreach ($item as $c)
                                        @if ($c)
                                            @if ($c['DATANG'] && $c['PULANG'])
                                                <td
                                                    style="background: green;width: 50px;height: 50px;border:1px solid #000">
                                                </td>
                                            @else
                                                <td
                                                    style="background: yellow;width: 50px;height: 50px;border:1px solid #000">
                                                </td>
                                            @endif
                                        @else
                                            <td style="width: 50px;height: 50px;border:1px solid #000">
                                            </td>
                                        @endif
                                    @endforeach
                                    @php
                                        $total_lengkap = count(
                                            array_filter($item, function ($val) {
                                                return $val ? $val['DATANG'] != null && $val['PULANG'] != null : false;
                                            }),
                                        );
                                        $tidak_lengkap = count(
                                            array_filter($item, function ($val) {
                                                return $val
                                                    ? $val['DATANG'] === null || $val['PULANG'] === null
                                                    : false;
                                            }),
                                        );

                                        $kosong = count(
                                            array_filter($item, function ($val) {
                                                return $val === false;
                                            }),
                                        );
                                    @endphp
                                    <td style="text-align: center;border:1px solid #000">
                                        {{ $total_lengkap }}
                                    </td>
                                    <td style="text-align: center;border:1px solid #000">
                                        {{ $tidak_lengkap }}
                                    </td>
                                    <td style="text-align: center;border:1px solid #000">
                                        {{ $kosong }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            @endforeach
        </div>
        {{-- @endif --}}
    @endif
</div>

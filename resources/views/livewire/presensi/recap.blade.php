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
        <div class="mt-3">
            <select wire:model="month" class="form-control">
                <option value="">--PILIH Bulan--</option>
                @foreach ($months as $key => $month)
                    <option value="{{ $key }}">
                        {{ $month }}
                    </option>
                @endforeach
            </select>
        </div>
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
        <div class="d-grid gap-5 mt-5" style="overflow: auto">
            @foreach ($recap as $r)
                @if (current($r)['data'])
                    <h1>
                        {{ array_keys($r)[0] }}
                    </h1>
                    @if (count(current($r)['day_off']) > 1)
                        <table style="width: 50%;max-width: 400px;border: 1px solid #000">
                            <tr>
                                <th style="text-align: center;border:1px solid #000">Tanggal</th>
                                <th style="text-align: center;border:1px solid #000">Keterangan</th>
                                <th style="text-align: center;border:1px solid #000">Cuti</th>
                            </tr>
                            @foreach (current($r)['day_off'] as $dayoff)
                                <tr>
                                    <td style="text-align: center;border:1px solid #000">
                                        {{ \Carbon\Carbon::parse($dayoff->tanggal)->day }}
                                    </td>
                                    <td style="text-align: center;border:1px solid #000">
                                        {{ $dayoff->keterangan }}
                                    </td>
                                    <td
                                        style="text-align: center;border:1px solid #000;background:@if ($dayoff->is_cuti) red @else orange @endif">

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                    <table style="width: 100%;border: 1px solid #000">
                        <thead>
                            <tr>
                                <td rowspan="2" style="width: 50px;text-align: center;border:1px solid #000">NO</td>
                                <td rowspan="2" style="padding-left: 3px;border:1px solid #000">NAMA</td>
                                <td colspan="{{ current($r)['total_days'] }}"
                                    style="text-align:center;border:1px solid #000">Tanggal</td>
                                <th colspan="4" style="text-align: center;border:1px solid #000">Total</th>
                            </tr>
                            <tr>
                                @for ($i = 1; $i <= current($r)['total_days']; $i++)
                                    @php
                                        $dayoff = array_filter(current($r)['day_off'], function ($item) use ($i) {
                                            return $i === \Carbon\Carbon::parse($item->tanggal)->day;
                                        });
                                        $filterDayOff = (array) current($dayoff);
                                    @endphp
                                    <th
                                        style="text-align:center;position:relative;
                                    @if (count($filterDayOff) === 3 && $filterDayOff['is_cuti'] === true) color:red
                                    @elseif (count($filterDayOff) === 3 && $filterDayOff['is_cuti'] === false) color:orange @endif
                                    ">
                                        {{ $i }}

                                    </th>
                                @endfor

                                <th
                                    style="text-align: center;width: 50px;border:1px solid #000;background:green;color:white">
                                </th>
                                <th style="text-align: center;width: 50px;border:1px solid #000;;background:orange">
                                </th>
                                <th style="text-align: center;width: 50px;border:1px solid #000">
                                </th>
                                <th style="text-align: center;width: 50px;border:1px solid #000">
                                    Uang makan
                                </th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach (current($r)['data'] as $name => $item)
                                <tr>
                                    <td style="text-align: center;border:1px solid #000;min-width: 50px;">
                                        {{ $loop->iteration }}</td>
                                    <td
                                        style="width: 300px;padding-left: 3px;border:1px solid #000;min-width: 100px;white-space:nowrap">
                                        {{ $name }}
                                    </td>
                                    @php
                                        $totalUangMakan = 0;
                                    @endphp
                                    @foreach ($item as $tgl => $c)
                                        @php
                                            $dayoff = array_filter(current($r)['day_off'], function ($item) use ($tgl) {
                                                return $tgl === \Carbon\Carbon::parse($item->tanggal)->day;
                                            });
                                            $filterDayOff = (array) current($dayoff);
                                        @endphp
                                        @if ($c)
                                            @if ($c['JAM_DATANG'] && $c['JAM_PULANG'])
                                                <td
                                                    style="background: green;height: 40px;border:1px solid #000;text-align:center;color:black;min-width: 100px;">
                                                    <p style="color:white">
                                                        {{ $c['JAM_DATANG'] }}
                                                        @if (compareTime($c['JAM_DATANG']))
                                                            ⭐
                                                            @php
                                                                $totalUangMakan++;
                                                            @endphp
                                                        @endif
                                                    </p>
                                                    <p style="color: red">{{ $c['JAM_PULANG'] }}</p>
                                                </td>
                                            @else
                                                <td
                                                    style="background: orange;height: 40px;border:1px solid #000;text-align:center;min-width: 100px;">
                                                    <p style="color:white">
                                                        {{ $c['JAM_DATANG'] }}
                                                    </p>
                                                    <p style="color: red">{{ $c['JAM_PULANG'] }}</p>
                                                </td>
                                            @endif
                                        @else
                                            <td style="height: 40px;border:1px solid #000;min-width: 100px;">
                                                @if (count($filterDayOff) === 3 && $filterDayOff['is_cuti'] === true)
                                                    <i style="margin: 0 10px;">OFF</i>
                                                @endif
                                            </td>
                                        @endif
                                    @endforeach
                                    @php
                                        $total_lengkap = count(
                                            array_filter($item, function ($val) {
                                                return $val
                                                    ? $val['JAM_DATANG'] != null && $val['JAM_PULANG'] != null
                                                    : false;
                                            }),
                                        );
                                        $tidak_lengkap = count(
                                            array_filter($item, function ($val) {
                                                return $val
                                                    ? $val['JAM_DATANG'] === null || $val['JAM_PULANG'] === null
                                                    : false;
                                            }),
                                        );

                                        $kosong = count(
                                            array_filter($item, function ($val) {
                                                return $val === false;
                                            }),
                                        );
                                    @endphp
                                    <td style="text-align: center;border:1px solid #000;min-width: 100px;">
                                        {{ $total_lengkap }}
                                    </td>
                                    <td style="text-align: center;border:1px solid #000;min-width: 100px;">
                                        {{ $tidak_lengkap }}
                                    </td>
                                    <td style="text-align: center;border:1px solid #000;min-width: 100px;">
                                        {{ $kosong }}
                                    </td>
                                    <td style="text-align: center;border:1px solid #000;min-width: 100px;">
                                        @if ($totalUangMakan > 0)
                                            {{ $totalUangMakan }} * 6500 =
                                            {{ formatRupiah($totalUangMakan * 6500) }}
                                            @else
                                            -
                                        @endif
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

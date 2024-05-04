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
                Lihat Rekap
            </button>
        </div>
    </form>

    @if ($recap)
        @foreach ($recap as $r)
            <div class="d-grid gap-5">
                <table class="table">
                    <thead>
                        <tr>
                            <td>NO</td>
                            <td>NAMA</td>
                            <td colspan="{{ current($r)['total_days'] }}" class="text-center">Tanggal</td>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            @for ($i = 1; $i <= current($r)['total_days']; $i++)
                                <th>{{ $i }}</th>
                            @endfor
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (current($r)['data'] as $key => $item)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>
                                    {{ $key }}
                                </th>
                                @foreach ($item as $c)
                                    @if ($c)
                                        <th style="background: green;padding: 10px">
                                        </th>
                                    @else
                                        <th style="background: red;padding: 10px">
                                        </th>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    @endif

</div>

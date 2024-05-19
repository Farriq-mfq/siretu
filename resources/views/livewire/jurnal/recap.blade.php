<div>
    <form action="">
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
        <div class="col-md-12 mt-2">
            <label class="form-label">
                Pilih personil
            </label>
            <select name="personil" wire:model="personil" class="form-control select2">
                <option value="" selected>--Pilih Personil--</option>
                @foreach ($personil as $p)
                    <option value="{{ $p->NAMALENGKAP }}">
                        {{ $p->NAMALENGKAP }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <select wire:model="month" class="form-control">
                <option value="">--PILIH Mapel--</option>
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
    {{-- view recap --}}
    <div>
        <table>
            <thead>
                <tr>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
</div>

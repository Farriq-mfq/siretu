<div>
    @if ($showFilterTanggal)
        <button wire:click="showFilterTanggalToggle" class="btn btn-danger">
            Sembunyikan filter tanggal
        </button>
    @else
        <button wire:click="showFilterTanggalToggle" class="btn btn-primary">
            Tampilkan filter tanggal
        </button>
    @endif
    <form class="row" wire:submit.prevent="filterData">
        @if ($showFilterTanggal)
            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="form-label">
                        Tanggal awal
                    </label>
                    <input type="date" wire:model="start" class="form-control" name="start"
                        value="{{ $filter['start_date'] }}" />
                </div>
                <div class="col-md-6">
                    <label class="form-label">
                        Tanggal akhir
                    </label>
                    <input type="date" wire:model="end" class="form-control  @error('end') is-invalid @enderror"
                        name="end" value="{{ $filter['end_date'] }}" />
                    @error('end')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        @endif
        <div class="col-md-12 mt-2">
            <label class="form-label">
                Pilih personil
            </label>
            <select name="personil" wire:model="selectedPersonil" class="form-control">
                <option value="" selected>--Pilih Personil--</option>
                @foreach ($personil as $p)
                    <option value="{{ $p->NAMALENGKAP }}">
                        {{ $p->NAMALENGKAP }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary">
                <i class="bx bx-filter" wire:loading.remove></i>
                <div class="spinner-border spinner-border-sm text-default" wire:loading role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                Tampilkan
            </button>
            @if ($filter['personil'] || ($filter['start_date'] && $filter['end_date']))
                <a href="{{ route('presensi', ['show' => 'filter']) }}" class="btn btn-danger">
                    Clear
                </a>
            @endif
        </div>
    </form>
</div>

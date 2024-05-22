<div>
    <form method="POST" wire:submit.prevent="handleSubmit">
        <div class="mb-3">
            <label for="guru" class="form-label">
                Pilih Guru
            </label>
            <select wire:model="guru" class="form-control @error('guru') is-invalid @enderror">
                <option value="">--Pilih Guru--</option>
                @foreach ($personil as $p)
                    <option value="{{ $p->NOTELP }}">{{ $p->NAMALENGKAP }}</option>
                @endforeach
            </select>
            @error('guru')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="rombel" class="form-label">
                Pilih Rombel
            </label>
            <select wire:model="rombel" class="form-control @error('rombel') is-invalid @enderror">
                <option value="">--Pilih Rombel--</option>
                @foreach ($rombels as $rombel)
                    <option value="{{ $rombel->ROMBEL }}">{{ $rombel->ROMBEL }}</option>
                @endforeach
            </select>
            @error('rombel')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="mapel" class="form-label">
                Masukan Mata Pelajaran
            </label>
            <input type="text" wire:model="mapel" class="form-control @error('rombel') is-invalid @enderror" />
            @error('mapel')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="walas" class="form-label">
                Pilih Wali Kelas
            </label>
            <select wire:model="walas" class="form-control @error('walas') is-invalid @enderror">
                <option value="">--Pilih Wali Kelas--</option>
                @foreach ($personil as $p)
                    <option value="{{ $p->NOTELP }}">{{ $p->NAMALENGKAP }}</option>
                @endforeach
            </select>
            @error('walas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="bk" class="form-label">
                Pilih BK
            </label>
            <select wire:model="bk" class="form-control @error('bk') is-invalid @enderror">
                <option value="">--Pilih BK--</option>
                @foreach ($personil as $p)
                    <option value="{{ $p->NOTELP }}">{{ $p->NAMALENGKAP }}</option>
                @endforeach
            </select>
            @error('bk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" wire:loading.attr="disabled">
                <span wire:loading.remove>Simpan</span>
                <span wire:loading>Loading...</span>
            </button>
        </div>
    </form>
</div>

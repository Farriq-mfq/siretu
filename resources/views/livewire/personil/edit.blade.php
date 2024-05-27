<div>
    <form method="POST" wire:submit.prevent="onSubmit">
        @csrf
        <div class="row">
            <div class="col-md-6 ">
                <label class="form-label">
                    No Telp <span class="text-danger">(Gunakan 62)</span>
                    @isRequired()
                </label>
                <input wire:model="notelp" type="text" class="form-control @error('notelp') is-invalid @enderror"
                    placeholder="Contoh : 62xxxx">
                @error('notelp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">
                    Nama Lengkap
                    @isRequired()
                </label>
                <input type="text" wire:model="namalengkap"
                    class="form-control @error('namalengkap') is-invalid @enderror" placeholder="Contoh : xxxx.S.pd">
                @error('namalengkap')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">
                    Email (optional)
                </label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" wire:model="email"
                    placeholder="Contoh : xxxx@admin.smk.belajar.id">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">
                    JABATAN @isRequired()
                </label>
                <input type="text" wire:model="jabatan" class="form-control  @error('jabatan') is-invalid @enderror"
                    placeholder="Contoh : Kepala Sekolah">
                @error('jabatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">
                    Kelompok @isRequired()
                </label>
                <select wire:model="kelompok" class="form-control @error('kelompok') is-invalid @enderror">
                    <option value="" selected>--PILIH KELOMPOK--</option>
                    @foreach ($kelompoks as $kelompok)
                        <option @if ($kelompok->kelompok === $personil->KELOMPOKGURU) selected @endif
                            value="{{ $kelompok->kelompok }}">{{ $kelompok->kelompok }}</option>
                    @endforeach
                </select>
                @error('kelompok')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">
                    Nama saja (optional)
                </label>
                <input type="text" wire:model="namasaja" class="form-control" placeholder="Contoh : xxxx">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label class="form-label">
                    JENIS KELAMIN @isRequired()
                </label>
                <select wire:model="kelamin" class="form-control @error('kelamin') is-invalid @enderror">
                    <option value="">--PILIH JENIS KELAMIN--</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                @error('kelamin')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">
                    PANGGILAN (optional)
                </label>
                <input wire:model="panggilan" type="text" class="form-control" placeholder="Contoh : Bapak xxx">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">
                    NAMA DISPO (optional)
                </label>
                <input wire:model="nama_dispo" type="text" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">
                    Panggilan dispo (optional)
                </label>
                <input wire:model="panggilan_dispo" type="text" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">
                    Jabatan dispo (optional)
                </label>
                <input type="text" wire:model="jabatan_dispo" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">
                    Status (optional)
                </label>
                <input type="text" wire:model="status" class="form-control" placeholder="Contoh : PTT">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">
                    No. Induk Pegawai (optional)
                </label>
                <input type="text" wire:model="no_induk" class="form-control" placeholder="XXX">
            </div>
            <div class="col-md-6">
                <label class="form-label">
                    No. Induk Pegawai Dispo (optional)
                </label>
                <input type="text" wire:model="no_induk_dispo" class="form-control" placeholder="XXX">
            </div>
        </div>
        <div>
            <label class="form-label">
                Mapel (optional)
            </label>
            <input type="text" class="form-control" placeholder="Contoh : Pendidikan Pancasila">
        </div>

        <div>
            <label class="form-label">
                FORWARDTO (optional)
            </label>
            <input type="text" wire:model="forwardto" class="form-control" placeholder="Contoh : 62896xxxxx">
        </div>


        <div class="mt-4">
            <button class="btn btn-primary">
                <span wire:loading>Tunggu...</span>
                <span wire:loading.remove>Update</span>
            </button>
        </div>

    </form>
</div>

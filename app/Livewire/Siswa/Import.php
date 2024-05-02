<?php

namespace App\Livewire\Siswa;

use App\Imports\SiswaImport;
use App\Models\Siswa;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Rap2hpoutre\FastExcel\FastExcel;

class Import extends Component
{
    protected Siswa $siswa;
    use WithFileUploads, LivewireAlert;
    public $file;
    public $rules = [
        'file' => 'required|mimes:xlsx, csv, xls'
    ];
    public function boot()
    {
        $this->siswa = new Siswa();
    }
    public function handleImport()
    {
        $this->validate();
        try {
            $collection = (new FastExcel)->import($this->file->getPathname());
            foreach ($collection as $siswa) {
                $this->siswa->create([
                    'nama' => $siswa["Nama"],
                    'nipd' => $siswa["NIPD"],
                    'jenis_kelamin' => $siswa["JK"],
                    'nisn' => $siswa["NISN"],
                    'tempat_lahir' => $siswa["Tempat Lahir"],
                    'tanggal_lahir' => $siswa["Tanggal Lahir"],
                    'nik' => $siswa["NIK"],
                    'agama' => $siswa["Agama"],
                    'alamat' => $siswa["Alamat"],
                    'rt' => $siswa["RT"],
                    'rw' => $siswa["RW"],
                    'dusun' => $siswa["Dusun"],
                    'kelurahan' => $siswa["Kelurahan"],
                    'kecamatan' => $siswa["Kecamatan"],
                    'kode_pos' => $siswa["Kode Pos"],
                    'jenis_tinggal' => $siswa["Jenis Tinggal"],
                    'alat_transportasi' => $siswa["Alat Transportasi"],
                    'telepon' => $siswa["Telepon"],
                    'notelp' => "62" . substr($siswa["HP"], 1),
                    'email' => $siswa["E-Mail"],
                    'SKHUN' => $siswa["SKHUN"],
                    'penerima_kps' => $siswa["Penerima KPS"],
                    'no_kps' => $siswa["No KPS"],
                    'rombel' => $siswa["ROMBEL"],
                    'NAMA_WALAS' => $siswa["NAMA_WALAS"],
                    'PANGGILAN_WALAS' => $siswa["PANGGILAN_WALAS"],
                    'NAMA_BK' => $siswa["NAMA_BK"],
                    'PANGGILAN_BK' => $siswa["PANGGILAN_BK"],
                    'FORWARDTO' => $siswa["FORWARDTO_BK"],
                ]);
            }
            $this->alert('success', 'Berhasil import');
            $this->reset('file');
        } catch (\Exception $e) {
            $this->alert('error', 'Terjadi kesalahan sistem');
        }
    }
    public function render()
    {
        return view('livewire.siswa.import');
    }
}

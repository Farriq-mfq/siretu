<?php

namespace App\Livewire\Siswa;

use App\Models\Personil;
use App\Models\Siswa;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Rap2hpoutre\FastExcel\FastExcel;

class Import extends Component
{
    protected Siswa $siswa;
    use WithFileUploads, LivewireAlert;
    public $file;
    public $totalRows;
    public $rules = [
        'file' => 'required|mimes:xlsx, csv, xls'
    ];
    public function boot()
    {
        $this->siswa = new Siswa();
    }

    public function getNoTelpWalasBK($collection)
    {
        $noTelpWalas = collect();
        $noTelpBK = collect();
        foreach ($collection as $siswa) {
            $noTelpWalas->add($siswa['NoTelp_Walas']);
            $noTelpBK->add($siswa['NoTelp_BK']);
        }
        $walas = $noTelpWalas->unique()->values()->toArray();
        $bk = $noTelpBK->unique()->values()->toArray();
        return [
            'walas' => collect($this->getPersonilByPhone($walas)),
            'bk' => collect($this->getPersonilByPhone($bk)),
        ];
    }

    public function getPersonilByPhone(array $phones)
    {
        return Personil::whereIn('NOTELP', $phones)->get();
    }

    public function handleImport()
    {
        $this->validate();
        try {
            $collection = (new FastExcel)->import($this->file->getPathname());
            $dataWalasBk = $this->getNoTelpWalasBK($collection);
            foreach ($collection as $siswa) {
                $walas = $dataWalasBk['walas']->where('NOTELP', $siswa['NoTelp_Walas'])->first();
                $bk = $dataWalasBk['bk']->where('NOTELP', $siswa['NoTelp_BK'])->first();
                $this->siswa->upsert([
                    'NOTELP' => $siswa["NOTELP"],
                    'NAMA' => strtoupper($siswa["NAMA"]),
                    'NOINDUK' => $siswa["NOINDUK"],
                    'NISN' => $siswa["NISN"],
                    'JK' => $siswa["JK"],
                    'AGAMA' => $siswa["Agama"],
                    'ROMBEL' => $siswa["ROMBEL"],
                    'NoTelp_Walas' => $walas ? $walas['NOTELP'] : NULL,
                    'NAMA_WALAS' => $walas ? $walas['NAMALENGKAP'] : NULL,
                    'PANGGILAN_WALAS' => $walas ? $walas['PANGGILAN'] : NULL,
                    'NoTelp_BK' => $bk ? $bk['NOTELP'] : NULL,
                    'NAMA_BK' => $bk ? $bk['NAMALENGKAP'] : NULL,
                    'PANGGILAN_BK' => $bk ? $bk['PANGGILAN'] : NULL,
                    'FORWARDTO' => $walas && $bk ? $walas['NOTELP'] . ';' . $bk['NOTELP'] : NULL
                ], 'NISN');
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

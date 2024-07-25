<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use App\Models\Personil;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Rap2hpoutre\FastExcel\FastExcel;

class Import extends Component
{
    use WithFileUploads, LivewireAlert;
    public $file;
    public $rules = [
        'file' => 'required|mimes:xlsx, csv, xls'
    ];


    public function getNoTelpWalasBK($collection)
    {
        $noTelpWalas = collect();
        $noTelpBK = collect();
        $noTelpGuru = collect();
        foreach ($collection as $siswa) {
            $noTelpWalas->add($siswa['NoTelp_Walas']);
            $noTelpBK->add($siswa['NoTelp_BK']);
            $noTelpGuru->add($siswa['NoTelp_Guru']);
        }
        $walas = $noTelpWalas->unique()->values()->toArray();
        $bk = $noTelpBK->unique()->values()->toArray();
        $guru = $noTelpGuru->unique()->values()->toArray();
        return [
            'walas' => collect($this->getPersonilByPhone($walas)),
            'bk' => collect($this->getPersonilByPhone($bk)),
            'guru' => collect($this->getPersonilByPhone($guru))
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
            $data = $this->getNoTelpWalasBK($collection);
            foreach ($collection as $kelas) {
                $guru = $data['guru']->where('NOTELP', $kelas['NoTelp_Guru'])->first();
                $walas = $data['walas']->where('NOTELP', $kelas['NoTelp_Walas'])->first();
                $bk = $data['bk']->where('NOTELP', $kelas['NoTelp_BK'])->first();
                if ($guru && $walas && $bk) {
                    Kelas::create([
                        'NAMALENGKAP' => $guru['NAMALENGKAP'],
                        'NoTelp' => $guru['NOTELP'],
                        'GURUMAPEL' => $guru['MAPEL'],
                        'NAMASAJA' => $guru['NAMASAJA'],
                        'ROMBEL' => $kelas['ROMBEL'],
                        'MAPEL' => $kelas['MAPEL'],
                        'ROMBEL_MAPEL' => $kelas['ROMBEL'] . '-' . $kelas['MAPEL'],
                        'NoTelp_Walas' => $walas['NOTELP'],
                        'NAMA_WALAS' => $walas['NAMALENGKAP'],
                        'PANGGILAN_WALAS' => $walas['PANGGILAN'],
                        'NoTelp_BK' => $bk['NOTELP'],
                        'NAMA_BK' => $bk['NAMALENGKAP'],
                        'PANGGILAN_BK' => $bk['PANGGILAN'],
                        'FORWARDTO' => $walas['NOTELP'] . ';' . $bk['NOTELP']
                    ], 'NoTelp');
                }

            }
            $this->alert('success', 'Berhasil import');
            $this->reset('file');
        } catch (\Exception $e) {
            $this->alert('error', 'Terjadi kesalahan sistem');
        }
    }
    public function render()
    {
        return view('livewire.kelas.import');
    }
}

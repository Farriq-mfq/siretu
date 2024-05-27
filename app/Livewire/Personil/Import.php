<?php

namespace App\Livewire\Personil;

use App\Events\NotifWa;
use App\Models\Personil;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Rap2hpoutre\FastExcel\FastExcel;

class Import extends Component
{
    use WithFileUploads, LivewireAlert;
    public $file;
    public $rules = [
        'file' => 'required|mimes:xlsx, csv, xls'
    ];
    public function handleImport()
    {
        $this->validate();
        try {
            $collection = (new FastExcel)->import($this->file->getPathname());
            foreach ($collection as $personil) {
                Personil::upsert([
                    'NOTELP' => $personil['NOTELP'],
                    'KELOMPOKGURU' => $personil["KELOMPOKGURU"],
                    'NAMASAJA' => $personil['NAMASAJA'] ?? $personil['NAMALENGKAP'],
                    'JABATAN' => $personil['JABATAN'],
                    'NAMALENGKAP' => $personil["NAMALENGKAP"],
                    'KELAMIN' => $personil['KELAMIN'],
                    'PANGGILAN' => $personil['PANGGILAN'],
                    'NAMADISPO' => $personil['NAMADISPO'] ?? $personil['NAMALENGKAP'],
                    'PANGGILANDISPO' => $personil['PANGGILANDISPO'] ?? $personil['NAMALENGKAP'],
                    'JABATANDISPO' => $personil['JABATANDISPO'] ?? $personil['JABATAN'],
                    'STATUS' => $personil['STATUS'],
                    'INDUKPEGAWAI' => $personil['INDUKPEGAWAI'],
                    'INDUKPEGAWAIDISPO' => $personil['INDUKPEGAWAIDISPO'] ?? $personil['INDUKPEGAWAI'],
                    'MAPEL' => $personil['MAPEL'],
                    'QRCODE' => 'https://wa.me/' . $personil['QRCODE'] ?? $personil['NOTELP'],
                    'FORWARDTO' => $personil['FORWARDTO'],
                    'EMAIL' => $personil['EMAIL']
                ], 'NOTELP');
                $message = 'Nomer anda telah berhasil diregistrasi : ' . PHP_EOL . 'Tanggal        : ' . \Carbon\Carbon::now()->format('d/m/Y') . '' . PHP_EOL . 'Nama        :  ' . $personil['NOTELP'] . '' . PHP_EOL . 'Jabatan       :  ' . $personil['JABATAN'] . '';
                \event(new NotifWa($message, [$personil['NOTELP']]));
            }
            $this->alert('success', 'Berhasil import');
            $this->reset('file');
        } catch (\Exception $e) {
            $this->alert('error', 'Terjadi kesalahan sistem');
        }
    }
    public function render()
    {
        return view('livewire.personil.import');
    }
}

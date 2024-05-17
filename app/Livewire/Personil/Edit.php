<?php

namespace App\Livewire\Personil;

use App\Models\KelompokPegawai;
use App\Models\Personil;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    public Personil $personil;
    public $notelp;
    public $namalengkap;
    public $email;
    public $jabatan;
    public $kelompok;
    public $namasaja;
    public $kelamin;
    public $panggilan;
    public $nama_dispo;
    public $panggilan_dispo;
    public $jabatan_dispo;
    public $status;
    public $no_induk;
    public $no_induk_dispo;
    public $mapel;
    public $id;
    public $rules = [
        'notelp' => [
            'required',
            'regex:/^(62)8[1-9][0-9]{6,9}$/'
        ],
        'namalengkap' => 'required',
        'jabatan' => 'required',
        'email' => 'nullable|email',
        'kelompok' => 'required',
        'kelamin' => 'required',
    ];
    public function mount(Personil $personil)
    {
        $this->notelp = $personil->NOTELP;
        $this->namalengkap = $personil->NAMALENGKAP;
        $this->email = $personil->EMAIL;
        $this->jabatan = $personil->JABATAN;
        $this->kelompok = $personil->KELOMPOKGURU;
        $this->namasaja = $personil->NAMASAJA;
        $this->kelamin = $personil->KELAMIN;
        $this->panggilan = $personil->PANGGILAN;
        $this->nama_dispo = $personil->NAMADISPO;
        $this->panggilan_dispo = $personil->PANGGILANDISPO;
        $this->jabatan_dispo = $personil->JABATANDISPO;
        $this->status = $personil->STATUS;
        $this->no_induk = $personil->INDUKPEGAWAI;
        $this->no_induk_dispo = $personil->INDUKPEGAWAIDISPO;
        $this->mapel = $personil->MAPEL;
        $this->id = $personil->id;
    }

    public function boot()
    {
        $this->personil = new Personil();
    }

    public function onSubmit()
    {
        $personil = $this->personil->findOrFail($this->id);
        $update = $personil->update([
            'NOTELP' => $this->notelp,
            'KELOMPOKGURU' => $this->kelompok,
            'NAMASAJA' => $this->namasaja ?? $this->namalengkap,
            'JABATAN' => $this->jabatan,
            'NAMALENGKAP' => $this->namalengkap,
            'KELAMIN' => $this->kelamin,
            'PANGGILAN' => $this->panggilan,
            'NAMADISPO' => $this->nama_dispo ?? $this->namalengkap,
            'PANGGILANDISPO' => $this->panggilan_dispo ?? $this->namalengkap,
            'JABATANDISPO' => $this->jabatan_dispo ?? $this->jabatan,
            'STATUS' => $this->status,
            'INDUKPEGAWAI' => $this->no_induk,
            'INDUKPEGAWAIDISPO' => $this->no_induk_dispo ?? $this->no_induk,
            'MAPEL' => $this->mapel,
            'QRCODE1' => 'https://wa.me/' . $this->notelp,
            'FORWARDTO' => $this->notelp,
            'EMAIL' => $this->email
        ]);

        if ($update) {
            $this->alert('success', 'Berhasil update personil');
        } else {
            $this->alert('error', 'Terjadi kesalahan sistem');
        }
    }

    public function render()
    {
        $kelompoks = KelompokPegawai::all();
        return view('livewire.personil.edit', compact('kelompoks'));
    }
}

<?php

namespace App\Livewire\Personil;

use App\Events\NotifWa;
use App\Models\KelompokPegawai;
use App\Models\Personil;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Add extends Component
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
    public function onSubmit()
    {
        $this->validate();
        $createPersonil = $this->personil->create([
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

        if ($createPersonil) {
            \event(new NotifWa('Nomer anda telah berhasil diregistrasi', [$this->notelp]));
            $this->reset('notelp', 'kelompok', 'namalengkap', 'namasaja', 'jabatan', 'kelamin', 'panggilan', 'nama_dispo', 'panggilan_dispo', 'jabatan_dispo', 'status', 'no_induk', 'no_induk_dispo', 'mapel', 'email');
            $this->alert('success', 'Berhasil menambah personil baru');
        } else {
            $this->alert('error', 'Terjadi kesalahan sistem');
        }
    }

    public function boot()
    {
        $this->personil = new Personil();
    }
    public function render()
    {
        $kelompoks = KelompokPegawai::all();
        return view('livewire.personil.add', compact('kelompoks'));
    }
}

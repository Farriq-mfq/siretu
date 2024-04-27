<?php

namespace App\Livewire\KelompokPegawai;

use App\Models\KelompokPegawai;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Add extends Component
{
    use LivewireAlert;
    public $kelompok;
    public KelompokPegawai $kelompokPegawai;
    public $rules = [
        'kelompok' => 'required'
    ];
    public function onSubmit()
    {
        $this->validate();
        $create = $this->kelompokPegawai->create([
            'kelompok' => $this->kelompok
        ]);
        if ($create) {
            $this->dispatch('reload');
            $this->alert('success', 'Berhasil menambah kelompok');
            $this->resetExcept('kelompokPegawai');
        } else {
            $this->alert('error', 'Terjadi kesalahan sistem');
        }
    }
    public function boot()
    {
        $this->kelompokPegawai = new KelompokPegawai();
    }
    public function render()
    {
        return view('livewire.kelompok-pegawai.add');
    }
}

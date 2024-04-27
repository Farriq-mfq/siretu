<?php

namespace App\Livewire\KelompokPegawai;

use App\Models\KelompokPegawai;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Action extends Component
{
    use LivewireAlert;
    public KelompokPegawai $kelompokPegawai;
    public $id;
    public function handleDelete()
    {
        $deleted = $this->kelompokPegawai->where('id', $this->id)->delete();
        if ($deleted) {
            $this->alert('success', 'Berhasil hapus kelompok');
            $this->dispatch('to_route', route('kelompok'));
        } else {
            $this->alert('error', 'Terjadi kesalahan sistem');
        }
    }
    public function mount($id)
    {
        $this->id = $id;
        $this->kelompokPegawai = new KelompokPegawai();
    }
    public function render()
    {
        return view('livewire.kelompok-pegawai.action');
    }
}

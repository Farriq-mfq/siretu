<?php

namespace App\Livewire\KelompokPegawai;

use App\Models\KelompokPegawai;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Action extends Component
{
    use LivewireAlert;
    public KelompokPegawai $kelompokPegawai;
    public $id;
    public function handleDelete()
    {
        $this->dispatch('confirmation', ['event' => 'delete-kelompok', 'text' => 'Yakin ingin menghapus kelompok ini ?', 'data' => ['id' => $this->id]]);
    }

    #[On('delete-kelompok')]
    public function onDeleteKelompok($id)
    {
        $deleted = $this->kelompokPegawai->where('id', $id)->delete();
        if ($deleted) {
            $this->alert('success', 'Berhasil hapus kelompok');
            $this->dispatch('reload');
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

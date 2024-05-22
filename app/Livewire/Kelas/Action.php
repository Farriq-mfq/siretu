<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Action extends Component
{
    use LivewireAlert;
    public $id;
    public function handleDelete()
    {
        $this->dispatch('confirmation', ['event' => 'delete-kelas', 'text' => 'Yakin ingin menghapus data kelas ini ?', 'data' => ['id' => $this->id]]);
    }


    #[On('delete-kelas')]
    public function onDeleteKelas($id)
    {
        $deleted = Kelas::where('id', $id)->delete();
        if ($deleted) {
            $this->alert('success', 'Berhasil hapus kelas');
            $this->dispatch('reload');
        }
    }
    public function render()
    {
        return view('livewire.kelas.action');
    }
}

<?php

namespace App\Livewire\Siswa;

use App\Models\Siswa;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Action extends Component
{
    use LivewireAlert;
    public $id;
    public Siswa $siswa;
    public function handleDelete()
    {
        $this->dispatch('confirmation', ['event' => 'delete-siswa', 'text' => 'Yakin ingin menghapus data siswa ini ?', 'data' => ['id' => $this->id]]);
    }

    #[On('delete-siswa')]
    public function onDelete($id)
    {
        $siswa = Siswa::find($id);
        if ($siswa) {
            $siswa->delete();
            $this->alert('success', 'Berhasil hapus siswa');
            $this->dispatch('reload');
        }
    }

    public function mount($id)
    {
        $this->id = $id;
    }

    public function boot()
    {
        $this->siswa = new Siswa();
    }

    public function render()
    {
        return view('livewire.siswa.action');
    }
}

<?php

namespace App\Livewire\Personil;

use App\Models\Personil;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Action extends Component
{
    use LivewireAlert;
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function handleDelete()
    {
        $this->dispatch('confirmation', ['event' => 'delete-personil', 'text' => 'Yakin ingin menghapus data personil ini ?', 'data' => ['id' => $this->id]]);
    }


    #[On('delete-personil')]
    public function onDeletePersonil($id)
    {
        $deleted = Personil::where('id', $id)->delete();
        if ($deleted) {
            $this->alert('success', 'Berhasil hapus personil');
            $this->dispatch('reload');
            $this->dispatch('deleted-wifi');
        }
    }

    public function render()
    {
        return view('livewire.personil.action');
    }
}

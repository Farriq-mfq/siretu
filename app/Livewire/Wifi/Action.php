<?php

namespace App\Livewire\Wifi;

use App\Models\Wifi;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Action extends Component
{
    use LivewireAlert;
    public Wifi $wifi;
    public $id;

    public function mount(string $id)
    {
        $this->id = $id;
    }
    public function boot()
    {
        $this->wifi = new Wifi();
    }

    public function handleEdit()
    {
        $data = $this->wifi->find($this->id);
        if ($data) {
            $this->dispatch('edit-wifi', $data);
        }
    }

    public function handleDelete()
    {
        $this->dispatch('confirmation', ['event' => 'delete-wifi', 'text' => 'Yakin ingin menghapus data wifi ini ?', 'data' => ['id' => $this->id]]);
    }

    #[On('delete-wifi')]
    public function onDeleteWifi($id)
    {
        $deleted = $this->wifi->where('id', $id)->delete();
        if ($deleted) {
            $this->alert('success', 'Berhasil hapus wifi');
            $this->dispatch('reload');
            $this->dispatch('deleted-wifi');
        }
    }
    public function render()
    {
        return view('livewire.wifi.action');
    }
}

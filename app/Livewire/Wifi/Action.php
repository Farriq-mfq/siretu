<?php

namespace App\Livewire\Wifi;

use App\Models\Wifi;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Action extends Component
{
    use LivewireAlert;
    public Wifi $wifi;
    public $id;

    public function mount(string $id)
    {
        $this->wifi = new Wifi();
        $this->id = $id;
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
        $deleted = $this->wifi->where('id', $this->id)->delete();
        if ($deleted) {
            $this->alert('success', 'Berhasil hapus wifi');
            $this->dispatch('reload');
            $this->dispatch('deleted-wifi');
        } else {
            $this->alert('error', 'Terjadi kesalahan sistem');
        }
    }
    public function render()
    {
        return view('livewire.wifi.action');
    }
}
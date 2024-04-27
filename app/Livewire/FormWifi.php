<?php

namespace App\Livewire;

use App\Models\Wifi;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class FormWifi extends Component
{
    use LivewireAlert;
    public Wifi $wifi;
    public string $ssid = "";
    public string $password = "";
    public string $updatedId = "";
    public $rules = [
        'ssid' => 'required',
        'password' => 'required'
    ];
    public function mount()
    {
        $this->wifi = new Wifi();
    }

    #[On('edit-wifi')]
    public function catchEdit($data)
    {
        if ($data) {
            $this->updatedId = $data['id'];
            $this->ssid = $data['SSID'];
            $this->password = $data['password'];
        }

    }

    public function handleCancel()
    {
        $this->resetExcept('wifi');
    }

    public function handleUpdate()
    {
        $this->validate();

        $wifi = $this->wifi->find($this->updatedId);
        $updated = $wifi->update([
            'SSID' => $this->ssid,
            'password' => $this->password
        ]);

        if ($updated) {
            $this->resetExcept('wifi');
            $this->alert('success', 'Berhasil update wifi');
            $this->dispatch('to_route', route('wifi'));
        } else {
            $this->alert('error', 'Terjadi kesalahan sistem');
        }
    }
    public function handleSubmit()
    {
        $this->validate();
        $insert = $this->wifi->create([
            'SSID' => $this->ssid,
            'password' => $this->password
        ]);

        if ($insert) {
            $this->resetExcept('wifi');
            $this->alert('success', 'Berhasil menambah wifi');
            $this->dispatch('to_route', route('wifi'));
        } else {
            $this->alert('error', 'Terjadi kesalahan sistem');
        }
    }
    public function render()
    {
        return view('livewire.form-wifi');
    }
}

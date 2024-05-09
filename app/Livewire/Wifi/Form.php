<?php

namespace App\Livewire\Wifi;

use App\Events\NotifWa;
use App\Models\Wifi;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Form extends Component
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
    public function boot()
    {
        $this->wifi = new Wifi();
    }

    #[On('edit-wifi')]
    public function catchEdit($data)
    {
        if (count($data)) {
            $this->updatedId = $data['id'];
            $this->ssid = $data['SSID'];
            $this->password = $data['password'];
        }
    }
    #[On('deleted-wifi')]
    public function catchDeleted()
    {
        $this->reset();
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
            $this->reset('ssid', 'password', 'updatedId');
            $this->alert('success', 'Berhasil update wifi');
            $this->dispatch('reload');
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
            $this->reset('ssid', 'password');
            $this->alert('success', 'Berhasil menambah wifi');
            $this->dispatch('reload');
            // send notif ke wa
            \event(new NotifWa("Berhasil menambah data wifi"));
        } else {
            $this->alert('error', 'Terjadi kesalahan sistem');
        }
    }

    public function render()
    {
        return view('livewire.wifi.form');
    }
}

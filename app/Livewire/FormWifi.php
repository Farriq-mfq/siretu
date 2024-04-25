<?php

namespace App\Livewire;

use App\Models\Wifi;
use Livewire\Component;

class FormWifi extends Component
{
    public Wifi $wifi;
    public string $ssid = "";
    public string $password = "";
    public $rules = [
        'ssid' => 'required',
        'password' => 'required'
    ];
    public function mount()
    {
        $this->wifi = new Wifi();
    }
    public function handleSubmit()
    {
        $this->validate();
        $insert = Wifi::create([
            'SSID' => $this->ssid,
            'password' => $this->password
        ]);

        if ($insert) {
            $this->reset('ssid', 'password');
            $this->dispatch('alert', ['message' => "Berhasil menambah data wifi", 'type' => "success"]);
            $this->dispatch('to_route', route('wifi'));
        } else {
            $this->dispatch('alert', ['message' => "Terjadi kesalahan sistem", 'type' => "error"]);
        }
    }
    public function render()
    {
        return view('livewire.form-wifi');
    }
}

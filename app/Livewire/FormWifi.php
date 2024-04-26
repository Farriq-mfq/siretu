<?php

namespace App\Livewire;

use App\Models\Wifi;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class FormWifi extends Component
{
    use LivewireAlert;
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

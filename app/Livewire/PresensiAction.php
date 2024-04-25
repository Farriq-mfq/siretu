<?php

namespace App\Livewire;

use App\Models\Presensi;
use Livewire\Component;

class PresensiAction extends Component
{
    public $NoFormulir;
    public $TglFormulir;
    public Presensi $presensi;
    public function mount($NoFormulir)
    {
        $this->NoFormulir = $NoFormulir;
        $this->presensi = new Presensi();
    }

    public function handleReset()
    {
        $deleted = $this->presensi->where('NoFormulir', $this->NoFormulir)->delete();

        if ($deleted) {
            $this->dispatch('alert', ['message' => "Berhasil reset presensi", 'type' => "success"]);
            $this->dispatch('to_route', url()->previous());
        } else {
            $this->dispatch('alert', ['message' => "Terjadi kesalahan sistem", 'type' => "error"]);
        }
    }
    public function render()
    {
        return view('livewire.presensi-action');
    }
}

<?php

namespace App\Livewire;

use App\Models\Presensi;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class PresensiAction extends Component
{
    use LivewireAlert;
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
            $this->alert('success', 'Berhasil reset presensi');
            $this->dispatch('to_route', url()->previous());
        } else {
            $this->alert('error', 'Terjadi kesalahan sistem');
        }
    }
    public function render()
    {
        return view('livewire.presensi-action');
    }
}

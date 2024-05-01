<?php

namespace App\Livewire\Presensi;

use App\Models\Presensi;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Action extends Component
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
            $this->dispatch('reload');
        } else {
            $this->alert('error', 'Terjadi kesalahan sistem');
        }
    }

    public function render()
    {
        return view('livewire.presensi.action');
    }
}

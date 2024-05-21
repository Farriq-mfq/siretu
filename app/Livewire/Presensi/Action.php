<?php

namespace App\Livewire\Presensi;

use App\Models\Presensi;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Action extends Component
{
    use LivewireAlert;
    public $NoTelp;
    public $TglFormulir;
    public Presensi $presensi;
    public function mount($NoTelp, $TglFormulir)
    {
        $this->NoTelp = $NoTelp;
        $this->TglFormulir = $TglFormulir;
    }

    public function boot()
    {

        $this->presensi = new Presensi();
    }

    #[On('reset-presensi')]
    public function onReset($NoTelp, $TglFormulir)
    {
        $deleted = $this->presensi->where('NoTelp', $NoTelp)->where('TglFormulir', $TglFormulir)->delete();

        if ($deleted) {
            $this->alert('success', 'Berhasil reset presensi');
            $this->dispatch('reload');
        }
    }

    public function handleReset()
    {
        $this->dispatch('confirmation', ['event' => 'reset-presensi', 'text' => 'Yakin ingin mereset data ini ?', 'data' => ['NoTelp' => $this->NoTelp, 'TglFormulir' => $this->TglFormulir]]);
    }

    public function render()
    {
        return view('livewire.presensi.action');
    }
}

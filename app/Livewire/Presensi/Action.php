<?php

namespace App\Livewire\Presensi;

use App\Models\Presensi;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
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
    }

    public function boot()
    {

        $this->presensi = new Presensi();
    }

    #[On('reset-presensi')]
    public function onReset($NoFormulir)
    {
        $deleted = $this->presensi->where('NoFormulir', $NoFormulir)->delete();

        if ($deleted) {
            $this->alert('success', 'Berhasil reset presensi');
            $this->dispatch('reload');
        }
    }

    public function handleReset()
    {
        $this->dispatch('confirmation', ['event' => 'reset-presensi', 'text' => 'Yakin ingin mereset data ini ?', 'data' => ['NoFormulir' => $this->NoFormulir]]);
    }

    public function render()
    {
        return view('livewire.presensi.action');
    }
}

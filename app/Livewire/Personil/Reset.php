<?php

namespace App\Livewire\Personil;

use App\Models\Personil;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Reset extends Component
{
    use LivewireAlert;
    public function handleReset()
    {
        $this->dispatch('confirmation', ['event' => 'reset-personil']);
    }
    #[On('reset-personil')]
    public function onReset()
    {
        try {
            Personil::truncate();
            $this->alert('success', "Berhasil reset data siswa");
        } catch (\Exception $e) {
            $this->alert("error", "Terjadi kesalahan");
        }
    }
    public function render()
    {
        return view('livewire.personil.reset');
    }
}

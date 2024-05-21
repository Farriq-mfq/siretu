<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Reset extends Component
{
    use LivewireAlert;
    public function handleReset()
    {
        $this->dispatch('confirmation', ['event' => 'reset-kelas']);

    }

    #[On('reset-kelas')]
    public function onReset()
    {
        try {
            Kelas::truncate();
            $this->alert('success', "Berhasil reset data kelas");
        } catch (\Exception $e) {
            $this->alert("error", "Terjadi kesalahan");
        }
    }
    public function render()
    {
        return view('livewire.kelas.reset');
    }
}

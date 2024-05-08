<?php

namespace App\Livewire\Siswa;

use App\Models\Siswa;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Reset extends Component
{
    use LivewireAlert;
    public function handleReset()
    {
        $this->dispatch('confirmation', ['event' => 'reset-siswa']);

    }

    #[On('reset-siswa')]
    public function onReset()
    {
        try {
            Siswa::truncate();
            $this->alert('success', "Berhasil reset data siswa");
        } catch (\Exception $e) {
            $this->alert("error", "Terjadi kesalahan");
        }
    }
    public function render()
    {
        return view('livewire.siswa.reset');
    }
}

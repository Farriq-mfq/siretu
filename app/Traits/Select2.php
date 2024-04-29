<?php

namespace App\Traits;

use Livewire\Attributes\On;

trait Select2
{
    #[On('select2')]
    public function select2($val)
    {
        $this->selectedPersonil = $val;
    }

    public function hydrate()
    {
        $this->dispatch('select2-hydrate');
    }

}

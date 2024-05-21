<?php

namespace App\Livewire\Setting;

use Illuminate\Support\Facades\Artisan;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ClearOutboxChat extends Component
{
    use LivewireAlert;
    public function handleReset()
    {
        Artisan::call('outbox:clear');
        $this->alert('success', 'berhasil reset outbox pesan');
    }
    public function render()
    {
        return view('livewire.setting.clear-outbox-chat');
    }
}

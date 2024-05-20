<?php

namespace App\Livewire\Dashboard;

use App\Models\KelompokPegawai;
use App\Models\Personil;
use App\Models\Siswa;
use App\Models\Wifi;
use Livewire\Component;

class Stats extends Component
{

    public $personil;
    public $siswa;
    public $kelompok;
    public $wifi;
    public function mount()
    {
        $this->personil = Personil::count();
        $this->siswa = Siswa::count();
        $this->kelompok = KelompokPegawai::count();
        $this->wifi = Wifi::count();
    }
    public function render()
    {
        return view('livewire.dashboard.stats');
    }
}

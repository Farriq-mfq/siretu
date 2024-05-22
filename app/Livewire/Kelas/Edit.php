<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use App\Models\Personil;
use App\Models\Siswa;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    public $kelas;
    public $guru;
    public $walas;
    public $bk;
    public $rombel;
    public $mapel;
    public $rules = [
        'guru' => 'required',
        'walas' => 'required',
        'bk' => 'required',
        'rombel' => 'required',
        'mapel' => 'required',
    ];
    public function handleSubmit()
    {
        $this->validate();
        $guru = Personil::where('NOTELP', $this->guru)->first();
        $walas = Personil::where('NOTELP', $this->walas)->first();
        $bk = Personil::where('NOTELP', $this->bk)->first();
        if ($guru && $walas && $bk) {
            $create = Kelas::where('id', $this->kelas->id)->update([
                'NAMALENGKAP' => $guru->NAMALENGKAP,
                'NoTelp' => $guru['NOTELP'],
                'GURUMAPEL' => $guru->MAPEL,
                'NAMASAJA' => $guru->NAMASAJA,
                'ROMBEL' => $this->rombel,
                'MAPEL' => $this->mapel,
                'ROMBEL_MAPEL' => $this->rombel . '-' . $this->mapel,
                'NoTelp_Walas' => $walas->NOTELP,
                'NAMA_WALAS' => $walas->NAMALENGKAP,
                'PANGGILAN_WALAS' => $walas->PANGGILAN,
                'NoTelp_BK' => $bk->NOTELP,
                'NAMA_BK' => $bk->NAMALENGKAP,
                'PANGGILAN_BK' => $bk->PANGGILAN,
                'FORWARDTO' => $walas->NOTELP . ';' . $bk->NOTELP
            ]);

            if ($create) {
                $this->alert('success', 'berhasil update kelas');
            } else {
                $this->alert('error', 'error update kelas');
            }
        }
    }
    public function mount()
    {
        $this->guru = $this->kelas->NoTelp;
        $this->walas = $this->kelas->NoTelp_Walas;
        $this->bk = $this->kelas->NoTelp_BK;
        $this->rombel = $this->kelas->ROMBEL;
        $this->mapel = $this->kelas->MAPEL;
    }
    public function render()
    {
        $siswaModel = new Siswa();
        $personil = Personil::all();
        $rombels = $siswaModel->select('ROMBEL')->groupBy('ROMBEL')->get();
        return view('livewire.kelas.edit', compact('personil', 'rombels'));
    }
}

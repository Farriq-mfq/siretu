<?php

namespace App\Livewire\Presensi;

use App\Events\NotifWa;
use App\Models\OutBox;
use App\Models\Personil;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class FormWarn extends Component
{
    use LivewireAlert;
    public $message;
    public $rules = [
        'message' => 'required'
    ];
    public function handleSend()
    {
        $this->validate();
        $today = Carbon::now()->format('Y-m-d');
        $modelPresensi = new Presensi();
        $modelPersonil = new Personil();
        $todayPresensi = $modelPresensi->fromSub(function ($q) use ($modelPresensi) {
            $q->select('*', DB::raw('@row_num := @row_num + 1 as row_num'))
                ->from($modelPresensi->getTable())
                ->crossJoin(DB::raw('(SELECT @row_num := 0) as vars'));
        }, 'presensi')->where('row_num', '>', 1)
            ->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') = ?", [$today])
            ->select('Notelp')
            ->get();
        $notyetPresensi = $modelPersonil
            ->whereNotIn('NOTELP', $todayPresensi)
            ->get();

        foreach ($notyetPresensi as $np) {
            \event(new NotifWa($this->message, [$np->NOTELP]));
        }
        $this->reset('message');
        $this->alert('success', 'berhasil mengirim pesan peringatan');
    }
    public function render()
    {
        return view('livewire.presensi.form-warn');
    }
}

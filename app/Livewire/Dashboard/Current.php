<?php

namespace App\Livewire\Dashboard;

use App\Models\IjinGuru;
use App\Models\Jurnal;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Current extends Component
{
    public function render()
    {
        $today = Carbon::now()->format('Y-m-d');
        $modelPresensi = new Presensi();
        $modelJurnal = new Jurnal();
        $modelIjinGuru = new IjinGuru();
        $presensi = $modelPresensi
            ->fromSub(function ($q) use ($modelPresensi) {
                $q->select('*', DB::raw('@row_num := @row_num + 1 as row_num'))
                    ->from($modelPresensi->getTable())
                    ->crossJoin(DB::raw('(SELECT @row_num := 0) as vars'));
            }, 'presensi')->where('row_num', '>', 1)
            ->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y'), '%Y-%m-%d') = ?", [$today])->orderBy('NoFormulir', 'ASC')
            ->limit(5)
            ->get();
        $jurnal = $modelJurnal
            ->fromSub(function ($q) use ($modelJurnal) {
                $q->select('*', DB::raw('@row_num := @row_num + 1 as row_num'))
                    ->from($modelJurnal->getTable())
                    ->crossJoin(DB::raw('(SELECT @row_num := 0) as vars'));
            }, 'jurnal')->where('row_num', '>', 1)
            ->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y'), '%Y-%m-%d') = ?", [$today])->orderBy('NoFormulir', 'DESC')
            ->limit(5)
            ->get();
        $ijinGuru = $modelIjinGuru->fromSub(function ($q) use ($modelIjinGuru) {
            $q->select('*', DB::raw('@row_num := @row_num + 1 as row_num'))
                ->from($modelIjinGuru->getTable())
                ->crossJoin(DB::raw('(SELECT @row_num := 0) as vars'));
        }, 'ijinguru')
            ->where('row_num', '>', 1)
            ->whereRaw("DATE_FORMAT(STR_TO_DATE(ijinguru.TglFormulir, '%d-%m-%Y'), '%Y-%m-%d') = ?", [$today])->orderBy('ijinguru.NoFormulir', 'DESC')
            ->limit(5)
            ->get();
        return view('livewire.dashboard.current', compact('presensi', 'jurnal', 'ijinGuru'));
    }
}

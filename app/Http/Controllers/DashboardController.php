<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Personil;
use App\Models\PresensiGuru;
use App\Models\PresensiTu;
use App\Services\DayOff\DayOff;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        return view('index');
    }

    protected function getStats(): array
    {
        $today = Carbon::now()->format('Y-m-d');

        return [
            'personil' => Personil::whereNot('NOMOR', 0)->count(),
            'presensi_tu' => PresensiTu::whereNot('NoFormulir', '-')->count(),
            'presensi_guru' => PresensiGuru::whereNot('NoFormulir', '-')->count(),
            'jurnal' => Jurnal::whereNot('NoFormulir', 0)->count(),
            'current_presences_tu' => PresensiTu::whereNot('NoFormulir', '-')->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') = ?", [$today])->orderBy('NoFormulir', 'ASC')->get(),
            'stats_presences_tu' => $this->getStatsPresencesTU()
        ];
    }

    protected function getStatsPresencesTU(): array
    {
        $today = Carbon::now()->format('Y-m-d');
        $query = PresensiTu::whereNot('NoFormulir', '-')->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') = ?", [$today])->orderBy('NoFormulir', 'ASC');
        return [
            'completed' => $query->count() > 0 ? $query->whereNotNull('DATANG')->whereNotNull('PULANG')->count() : 0,
            'uncompleted' => $query->count() > 0 ? $query->whereNull('DATANG')->orWhereNull('PULANG')->count() : 0,
            '0' => $query->count() > 0 ? $query->where('KONDISI', 'Sehat dan bahagia')->count() : 0,
            '1' => $query->count() > 0 ? $query->where('KONDISI', 'Tanpa Keterangan')->count() : 0,
            '2' => $query->count() > 0 ? $query->where('KONDISI', 'Sakit')->count() : 0,
        ];
    }
}

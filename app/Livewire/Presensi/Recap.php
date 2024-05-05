<?php

namespace App\Livewire\Presensi;

use App\Exports\PresensiRecap;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Recap extends Component
{
    public $year;
    public $month;
    public $rules = [
        'year' => 'required|digits:4|integer|min:1900',
    ];
    public $recap;
    public function getAllPresensi()
    {
        $this->validate();
        $presensiModel = new Presensi();
        $months = getMonths();
        if ($this->month) {
            $presensi = $presensiModel
                ->whereNot('NoFormulir', '-')
                ->whereRaw("MONTH(DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d'))=?", $this->month)
                ->whereRaw("YEAR(DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d'))=?", $this->year)
                ->get();
        } else {
            $presensi = $presensiModel
                ->whereNot('NoFormulir', '-')
                ->whereRaw("YEAR(DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d'))=?", $this->year)
                ->select("*", DB::raw("MONTH(DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d')) as month"), DB::raw("DAY(DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d')) as day"))
                ->get();
            $permonths = [];
            foreach ($months as $key => $month) {
                $getDays = Carbon::createFromDate(null, $key, null)->daysInMonth;
                $permonth = $presensi->filter(function ($val) use ($key) {
                    return $val['month'] === $key;
                });

                $numberOfDays = collect(range(1, $getDays));
                $results = array_map(function ($filterPerday) use ($numberOfDays) {
                    $r = [];
                    for ($i = 1; $i <= $numberOfDays->count(); $i++) {
                        $r[$i] = current(array_filter($filterPerday, function ($val) use ($i) {
                            return $val['day'] === $i;
                        }));
                    }
                    return $r;
                }, $permonth->groupBy('NAMALENGKAP')->toArray());
                $permonths[] = [
                    $month => [
                        'total_days' => $getDays,
                        'data' => $results,
                    ]
                ];

            }
        }

        $this->recap = $permonths;

    }

    public function exportRecap()
    {
        return Excel::download(new PresensiRecap($this->recap), Carbon::now()->format('Y-m-dH-i-s') . '_presensi.xlsx');
    }

    public function render()
    {
        $years = Presensi::whereNot('NoFormulir', '-')
            ->select(DB::raw("YEAR(DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d')) as year"))
            ->groupBy('year')
            ->orderBy('year')
            ->get();
        $months = getMonths();
        return view('livewire.presensi.recap', compact('years', 'months'));
    }
}
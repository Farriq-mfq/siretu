<?php

namespace App\Livewire\Presensi;

use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

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
        $months = [
            1 => "Januari",
            2 => "Februari",
            3 => "Maret",
            4 => "April",
            5 => "Mei",
            6 => "Juni",
            7 => "Juli",
            8 => "Agustus",
            9 => "September",
            10 => "Oktober",
            11 => "November",
            12 => "Desember"
        ];
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
                $permonths[] = [
                    $month => [
                        'total_days' => $getDays,
                        'data' => array_map(function ($filterPerday) use ($numberOfDays) {
                            $r = [];
                            for ($i = 1; $i <= $numberOfDays->count(); $i++) {
                                $r[$i] = current(array_filter($filterPerday, function ($val) use ($i) {
                                    return $val['day'] === $i;
                                }));
                            }
                            return $r;
                        }, $permonth->groupBy('NAMALENGKAP')->toArray())
                    ]
                ];

            }
        }

        $this->recap = $permonths;

    }

    public function render()
    {
        $years = Presensi::whereNot('NoFormulir', '-')
            ->select(DB::raw("YEAR(DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d')) as year"))
            ->groupBy('year')
            ->orderBy('year')
            ->get();
        $months = [
            1 => "Januari",
            2 => "Februari",
            3 => "Maret",
            4 => "April",
            5 => "Mei",
            6 => "Juni",
            7 => "Juli",
            8 => "Agustus",
            9 => "September",
            10 => "Oktober",
            11 => "November",
            12 => "Desember"
        ];
        return view('livewire.presensi.recap', compact('years', 'months'));
    }
}

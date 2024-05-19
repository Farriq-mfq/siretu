<?php

namespace App\Livewire\Jurnal;

use App\Models\Jurnal;
use App\Models\Personil;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Recap extends Component
{
    public $selectedPersonil;
    public $month;
    public $year;
    public function render()
    {
        $model = new Jurnal();
        $years = $model->fromSub(function ($q) use ($model) {
            $q->select('*', DB::raw('@row_num := @row_num + 1 as row_num'))
                ->from($model->getTable())
                ->crossJoin(DB::raw('(SELECT @row_num := 0) as vars'));
        }, 'jurnal')->where('row_num', '>', 1)
            ->select(DB::raw("YEAR(DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d')) as year"))
            ->groupBy('year')
            ->orderBy('year')
            ->get();
        $months = getMonths();
        $personil = Personil::all();
        return view('livewire.jurnal.recap', compact('years', 'months', 'personil'));
    }
}

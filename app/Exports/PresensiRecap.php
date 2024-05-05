<?php

namespace App\Exports;

use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PresensiRecap implements FromView
{
    public function __construct(private readonly mixed $recap)
    {
    }
    public function view(): View
    {
        return view('presensi.report.recap', ['recap' => $this->recap]);
    }
}

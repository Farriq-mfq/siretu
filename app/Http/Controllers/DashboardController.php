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
        $tab = ['statisik', 'grafik'];
        $currentTab = request('tab') && in_array(request('tab'), $tab) ? request('tab') : 'statistik';
        return view('index', compact('currentTab'));
    }
}

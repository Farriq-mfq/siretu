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
}

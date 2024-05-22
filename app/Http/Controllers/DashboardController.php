<?php

namespace App\Http\Controllers;

use Asantibanez\LivewireCharts\Facades\LivewireCharts;



class DashboardController extends Controller
{
    public function index()
    {
        $tab = ['statisik', 'grafik'];
        $currentTab = request('tab') && in_array(request('tab'), $tab) ? request('tab') : 'statistik';
        return view('index', compact('currentTab'));
    }
}

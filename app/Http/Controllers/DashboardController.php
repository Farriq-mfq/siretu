<?php

namespace App\Http\Controllers;

use Asantibanez\LivewireCharts\Facades\LivewireCharts;



class DashboardController extends Controller
{
    public function index()
    {
        $tab = ['statisik', 'grafik'];
        $currentTab = request('tab') && in_array(request('tab'), $tab) ? request('tab') : 'statistik';
        $columnChartModel =
            LivewireCharts::multiColumnChartModel()
                ->setTitle('Notification Stats')
                ->setAnimated(true)
                ->setDataLabelsEnabled(true)
                ->setSmoothCurve()
                ->setColors(['#15803d', '#b91c1c', '#1d4ed8']) // Set your colors accordingly
        ;
        return view('index', compact('currentTab', 'columnChartModel'));
    }
}

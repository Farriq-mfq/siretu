<?php

namespace App\Livewire\Dashboard;

use App\Models\Kelas;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;

class Chart extends Component
{
    public $types = ['tepat', 'telat'];
    public $colors = [
        'tepat' => '#f6ad55',
        'telat' => '#fc8181',
    ];
    public function render()
    {
        // $expenses = Kelas::get();

        // $columnChartModel = $expenses
        //     ->reduce(
        //         function ($columnChartModel, $data) {
        //             $type = $data->first()->type;
        //             $value = 10;

        //             return $columnChartModel->addColumn($type, $value, $this->colors[$type]);
        //         },
        //         LivewireCharts::columnChartModel()
        //             ->setTitle('Expenses by Type')
        //             ->setAnimated(true)
        //             ->withOnColumnClickEventName('onColumnClick')
        //             ->setLegendVisibility(false)
        //             ->setDataLabelsEnabled(true)
        //             //->setOpacity(0.25)
        //             ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
        //             ->setColumnWidth(90)
        //             ->withGrid()
        //     );
        return view('livewire.dashboard.chart');
    }
}

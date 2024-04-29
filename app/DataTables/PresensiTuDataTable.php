<?php

namespace App\DataTables;

use App\Models\PresensiTu;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PresensiTuDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'presensi.tu.action')
            ->addColumn('status', function ($row) {
                return view('presensi.status', compact('row'));
            })
            ->setRowId('NoFormulir');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PresensiTu $model): QueryBuilder
    {
        $today = Carbon::now()->format('Y-m-d');
        $by = request('show') ?? 'current';
        if ($by === 'current') {
            return $model
                ->whereNot('NoFormulir', '-')
                ->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') = ?", [$today])->orderBy('NoFormulir', 'ASC')->newQuery();
        } else if ($by === 'all') {
            return $model
                ->whereNot('NoFormulir', '-')->newQuery();
        } else if ($by === 'filter') {
            if (request()->has('personil') && request()->has('start_date') && request()->has('end_date')) {
                return $model
                    ->whereNot('NoFormulir', '-')
                    ->where('NAMALENGKAP', request()->get('personil'))
                    ->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') >= ?", request()->get('start_date'))->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') <= ?", request()->get('end_date'))
                    ->newQuery();
            } else if (request()->has('start_date') && request()->has('end_date')) {
                return $model
                    ->whereNot('NoFormulir', '-')
                    ->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') >= ?", request()->get('start_date'))->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') <= ?", request()->get('end_date'))
                    ->newQuery();
            } else if (request()->has('personil')) {
                return $model
                    ->whereNot('NoFormulir', '-')
                    ->where('NAMALENGKAP', request()->get('personil'))
                    ->newQuery();
            }
        } else {
            return $model
                ->whereNot('NoFormulir', '-')->newQuery();
        }
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('presensitu-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                // Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('NoFormulir'),
            Column::make('status'),
            Column::make('NAMALENGKAP'),
            Column::make('TglFormulir'),
            Column::make('JAM_DATANG'),
            Column::make('JAM_PULANG'),
            Column::make('AKTIFITAS'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PresensiTu_' . date('YmdHis');
    }
}

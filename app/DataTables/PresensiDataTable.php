<?php

namespace App\DataTables;

use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PresensiDataTable extends DataTable
{

    protected string|array $exportColumns = [
        ['data' => 'status', 'title' => 'Status'],
        ['data' => 'NAMALENGKAP', 'title' => 'Nama'],
        ['data' => 'TglFormulir', 'title' => 'Tanggal'],
        ['data' => 'JAM_DATANG', 'title' => 'Jam Datang'],
        ['data' => 'JAM_PULANG', 'title' => 'Jam Pulang'],
        ['data' => 'JARAK_DATANG', 'title' => 'Jarak datang'],
        ['data' => 'JARAK_PULANG', 'title' => 'Jarak pulang'],
    ];
    protected string|array $printColumns = [
        ['data' => 'status', 'title' => 'Status'],
        ['data' => 'NAMALENGKAP', 'title' => 'Nama'],
        ['data' => 'TglFormulir', 'title' => 'Tanggal'],
        ['data' => 'JAM_DATANG', 'title' => 'Jam Datang'],
        ['data' => 'JAM_PULANG', 'title' => 'Jam Pulang'],
    ];
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'presensi.action')
            ->addColumn('status', function ($row) {
                return view('presensi.status', compact('row'));
            })
            ->setRowId('NoFormulir');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Presensi $model): QueryBuilder
    {
        $today = Carbon::now()->format('Y-m-d');
        $by = request('show') ?? 'current';
        if ($by === 'current') {
            return $model
                ->fromSub(function ($q) use ($model) {
                    $q->select('*', DB::raw('@row_num := @row_num + 1 as row_num'))
                        ->from($model->getTable())
                        ->crossJoin(DB::raw('(SELECT @row_num := 0) as vars'));
                }, 'row_number')->where('row_num', '>', 1)
                ->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') = ?", [$today])->orderBy('NoFormulir', 'ASC')->newQuery();
        } else if ($by === 'all') {
            return $model->fromSub(function ($q) use ($model) {
                $q->select('*', DB::raw('@row_num := @row_num + 1 as row_num'))
                    ->from($model->getTable())
                    ->crossJoin(DB::raw('(SELECT @row_num := 0) as vars'));
            }, 'row_number')->where('row_num', '>', 1)
                ->newQuery();
        } else if ($by === 'filter') {
            if (request()->segment(3) && request()->has('start_date') && request()->has('end_date')) {
                return $model
                    ->fromSub(function ($q) use ($model) {
                        $q->select('*', DB::raw('@row_num := @row_num + 1 as row_num'))
                            ->from($model->getTable())
                            ->crossJoin(DB::raw('(SELECT @row_num := 0) as vars'));
                    }, 'row_number')->where('row_num', '>', 1)
                    ->where('NAMALENGKAP', urldecode(request()->segment(3)))
                    ->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') >= ?", request()->get('start_date'))->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') <= ?", request()->get('end_date'))
                    ->newQuery();
            } else if (request()->has('start_date') && request()->has('end_date')) {
                return $model
                    ->fromSub(function ($q) use ($model) {
                        $q->select('*', DB::raw('@row_num := @row_num + 1 as row_num'))
                            ->from($model->getTable())
                            ->crossJoin(DB::raw('(SELECT @row_num := 0) as vars'));
                    }, 'row_number')->where('row_num', '>', 1)
                    ->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') >= ?", request()->get('start_date'))->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') <= ?", request()->get('end_date'))
                    ->newQuery();
            } else if (request()->segment(3)) {
                return $model
                    ->fromSub(function ($q) use ($model) {
                        $q->select('*', DB::raw('@row_num := @row_num + 1 as row_num'))
                            ->from($model->getTable())
                            ->crossJoin(DB::raw('(SELECT @row_num := 0) as vars'));
                    }, 'row_number')->where('row_num', '>', 1)
                    ->where('NAMALENGKAP', urldecode(request()->segment(3)))
                    ->newQuery();
            }
        } else {
            return $model
                ->fromSub(function ($q) use ($model) {
                    $q->select('*', DB::raw('@row_num := @row_num + 1 as row_num'))
                        ->from($model->getTable())
                        ->crossJoin(DB::raw('(SELECT @row_num := 0) as vars'));
                }, 'row_number')->where('row_num', '>', 1)
                ->newQuery();
        }
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('presensi-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->parameters([
                'but'
            ])
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
            Column::make('NoFormulir')
                ->exportable(false)
                ->printable(false),
            Column::make('status'),
            Column::make('NAMALENGKAP'),
            Column::make('TglFormulir'),
            Column::make('JAM_DATANG'),
            Column::make('JAM_PULANG'),
            // Column::make('AKTIFITAS'),
            // Column::computed('action')
            //     ->exportable(false)
            //     ->printable(false)
            //     ->width(60)
            //     ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Presensi_' . date('YmdHis');
    }
}

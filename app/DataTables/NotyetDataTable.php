<?php

namespace App\DataTables;

use App\Models\Personil;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class NotyetDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'notyet.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Personil $model): QueryBuilder
    {
        $today = Carbon::now()->format('Y-m-d');
        $modelPresensi = new Presensi();
        $todayPresensi = $modelPresensi->fromSub(function ($q) use ($modelPresensi) {
            $q->select('*', DB::raw('@row_num := @row_num + 1 as row_num'))
                ->from($modelPresensi->getTable())
                ->crossJoin(DB::raw('(SELECT @row_num := 0) as vars'));
        }, 'presensi')->where('row_num', '>', 1)
            ->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') = ?", [$today])
            ->select('Notelp')
            ->get();
        return $model
            ->whereNotIn('NOTELP', $todayPresensi)
            ->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('notyet-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->buttons([
                // Button::make('excel'),
                // Button::make('csv'),
                // Button::make('pdf'),
                // Button::make('print'),
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
            // Column::make('id'),
            Column::make('NOTELP'),
            Column::make('NAMALENGKAP'),
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
        return 'Notyet_' . date('YmdHis');
    }
}

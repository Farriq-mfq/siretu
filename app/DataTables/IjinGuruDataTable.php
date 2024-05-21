<?php

namespace App\DataTables;

use App\Models\IjinGuru;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class IjinGuruDataTable extends DataTable
{
    protected string $printPreview = 'perijinan.guru.print';
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'ijinguru.action')
            ->addColumn('status', function (IjinGuru $row) {
                return view('perijinan.guru.status', compact('row'));
            })
            ->setRowId('NoFormulir');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(IjinGuru $model): QueryBuilder
    {
        return $model
            ->fromSub(function ($q) use ($model) {
                $q->select('*', DB::raw('@row_num := @row_num + 1 as row_num'))
                    ->from($model->getTable())
                    ->crossJoin(DB::raw('(SELECT @row_num := 0) as vars'));
            }, 'ijinguru')->where('row_num', '>', 1)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('ijinguru-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->buttons([
                Button::make('excel'),
                // Button::make('csv'),
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
            Column::make('NOFORMULIR'),
            Column::make('NAMALENGKAP'),
            Column::make('JENISIJIN'),
            Column::make('TGLIJIN'),
            Column::make('TGLIJIN2'),
            Column::make('status'),
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
        return 'IjinGuru_' . date('YmdHis');
    }
}

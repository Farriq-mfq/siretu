<?php

namespace App\DataTables;

use App\Models\Personil;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PersonilDataTable extends DataTable
{
    protected string|array $exportColumns = [
        'NOMOR',
        'NOTELP',
        'KELOMPOKGURU',
        'NAMASAJA',
        'JABATAN',
        'NAMALENGKAP',
        'KELAMIN',
        'PANGGILAN',
        'NAMADISPO',
        'PANGGILANDISPO',
        'JABATANDISPO',
        'STATUS',
        'INDUKPEGAWAI',
        'INDUKPEGAWAIDISPO',
        'MAPEL',
        'QRCODE1',
        'FORWARDTO',
        'EMAIL'
    ];
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'personil.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Personil $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('personil-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                // Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload'),
                'addPersonil'
            ]);
    }
    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            // Column::make('NOMOR')->printable(false)->exportable(false),
            Column::make('NAMALENGKAP'),
            Column::make("NOTELP"),
            Column::make('KELOMPOKGURU'),
            Column::make('JABATAN'),
            Column::computed('action')->printable(false)->exportable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Personil_' . date('YmdHis');
    }
}

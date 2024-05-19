<?php

namespace App\DataTables;

use App\Models\Jurnal;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class JurnalDataTable extends DataTable
{

    protected string|array $exportColumns = [
        'NoFormulir',
        'TglFormulir',
        'NoTelp',
        'JURNAL',
        'MAPS_JURNAL',
        'JARAK_JURNAL',
        'MULAI',
        'SELESAI',
        'NAMALENGKAP',
        'PANGGILAN',
        'INDUKPEGAWAI',
        'ROMBEL_MAPEL',
        'ROMBEL',
        'MAPEL',
        'NAMA_WALAS',
        'PANGGILAN_WALAS',
        'NIP_WALAS',
        'NoTelp_Walas',
        'NAMA_BK',
        'PANGGILAN_BK',
        'NIP_BK',
        'NoTelp_BK',
        'FORWARDTO',
        'URAIAN_KEGIATAN',
        'KETERANGAN',
        'IJIN',
        'SAKIT',
        'ALPHA',
        'DISPEN',
        'FOTO',
        'QrCode',
        'PDFFILENAME',
    ];

    protected string $printPreview = 'jurnal.print';
    protected bool $fastExcel = true;

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'jurnal.action')
            ->setRowId('NoFormulir');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Jurnal $model): QueryBuilder
    {
        $by = request('show') ?? 'all';
        if ($by === 'all') {
            return $model
                ->fromSub(function ($q) use ($model) {
                    $q->select('*', DB::raw('@row_num := @row_num + 1 as row_num'))
                        ->from($model->getTable())
                        ->crossJoin(DB::raw('(SELECT @row_num := 0) as vars'));
                }, 'jurnal')->where('row_num', '>', 1)->newQuery();
        } else if ($by === 'filter') {
            if (request()->segment(3) && request()->has('start_date') && request()->has('end_date')) {
                return $model
                    ->fromSub(function ($q) use ($model) {
                        $q->select('*', DB::raw('@row_num := @row_num + 1 as row_num'))
                            ->from($model->getTable())
                            ->crossJoin(DB::raw('(SELECT @row_num := 0) as vars'));
                    }, 'jurnal')->where('row_num', '>', 1)
                    ->where('NAMALENGKAP', urldecode(request()->segment(3)))
                    ->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') >= ?", request()->get('start_date'))->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') <= ?", request()->get('end_date'))
                    ->newQuery();
            } else if (request()->has('start_date') && request()->has('end_date')) {
                return $model
                    ->fromSub(function ($q) use ($model) {
                        $q->select('*', DB::raw('@row_num := @row_num + 1 as row_num'))
                            ->from($model->getTable())
                            ->crossJoin(DB::raw('(SELECT @row_num := 0) as vars'));
                    }, 'jurnal')->where('row_num', '>', 1)
                    ->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') >= ?", request()->get('start_date'))->whereRaw("DATE_FORMAT(STR_TO_DATE(TglFormulir, '%d-%m-%Y %H:%i'), '%Y-%m-%d') <= ?", request()->get('end_date'))
                    ->newQuery();
            } else if (request()->segment(3)) {
                return $model
                    ->fromSub(function ($q) use ($model) {
                        $q->select('*', DB::raw('@row_num := @row_num + 1 as row_num'))
                            ->from($model->getTable())
                            ->crossJoin(DB::raw('(SELECT @row_num := 0) as vars'));
                    }, 'jurnal')->where('row_num', '>', 1)
                    ->where('NAMALENGKAP', urldecode(request()->segment(3)))
                    ->newQuery();
            }
        } else {
            return $model
                ->fromSub(function ($q) use ($model) {
                    $q->select('*', DB::raw('@row_num := @row_num + 1 as row_num'))
                        ->from($model->getTable())
                        ->crossJoin(DB::raw('(SELECT @row_num := 0) as vars'));
                }, 'jurnal')->where('row_num', '>', 1)->newQuery();
        }
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('jurnal-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
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
            Column::make('NoFormulir'),
            Column::make('TglFormulir'),
            Column::make('MULAI'),
            Column::make('SELESAI'),
            Column::make('NAMALENGKAP'),
            Column::make('ROMBEL_MAPEL'),
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
        return 'Jurnal_' . date('YmdHis');
    }
}

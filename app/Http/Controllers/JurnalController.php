<?php

namespace App\Http\Controllers;

use App\DataTables\JurnalDataTable;
use App\Models\Jurnal;
use App\Models\Personil;
use Illuminate\Http\Request;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf;

class JurnalController extends Controller
{
    public function __construct(
        private readonly Personil $personil,
        private readonly Jurnal $jurnal,
    ) {

    }
    public function index(JurnalDataTable $dataTable)
    {
        $showAvailable = ['all', 'filter', 'recap'];
        $by = request('show') ? in_array(request('show'), $showAvailable) ? request('show') : 'all' : "all";
        $filter = request('show') === 'filter' ? [
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
            'personil' => request('personil'),
        ] : [];
        return $dataTable->render('jurnal.index', compact('by', 'filter'));
    }

    public function detail(
        $noTelp,
        $tanggal
    ) {
        $jurnal = $this->jurnal->where('NoTelp', $noTelp)->where('TglFormulir', urldecode($tanggal))->first();
        if (!$jurnal)
            abort(404);
        return view('jurnal.detail', compact('jurnal'));
    }

    public function generateJurnal($personil, $tanggal)
    {
        $jurnal = $this->jurnal->where('NoTelp', $personil)->where('TglFormulir', urldecode($tanggal))->first();
        if (!$jurnal)
            abort(404);
        $pdf = LaravelMpdf::loadView('jurnal.pdf.generate', compact('jurnal'));
        return $pdf->download();
    }
}

<?php

namespace App\Http\Controllers;

use App\DataTables\PresensiDataTable;
use App\Models\Personil;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function __construct(
        private readonly Personil $personil
    ) {

    }
    public function index(PresensiDataTable $dataTable)
    {
        $showAvailable = ['all', 'current', 'filter', 'recap'];
        $by = request('show') ? in_array(request('show'), $showAvailable) ? request('show') : 'current' : "current";
        $filter = request('show') === 'filter' ? [
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
            'personil' => request('personil'),
        ] : [];
        $personil = $this->personil->get();
        return $dataTable->render('presensi.index', compact('by', 'filter', 'personil'));
    }
}

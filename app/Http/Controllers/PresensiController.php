<?php

namespace App\Http\Controllers;

use App\DataTables\PresensiDataTable;
use App\Models\Personil;

class PresensiController extends Controller
{
    public function index(PresensiDataTable $dataTable)
    {
        $showAvailable = ['all', 'current', 'filter', 'recap', 'stats'];
        $by = request('show') ? in_array(request('show'), $showAvailable) ? request('show') : 'current' : "current";
        $filter = request('show') === 'filter' ? [
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
            'personil' => request('personil'),
        ] : [];
        return $dataTable->render('presensi.index', compact('by', 'filter'));
    }
}

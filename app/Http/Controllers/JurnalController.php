<?php

namespace App\Http\Controllers;

use App\DataTables\JurnalDataTable;
use App\Models\Personil;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    public function __construct(
        private readonly Personil $personil
    ) {

    }
    public function index(JurnalDataTable $dataTable)
    {
        $showAvailable = ['all', 'filter'];
        $by = request('show') ? in_array(request('show'), $showAvailable) ? request('show') : 'all' : "all";
        $filter = request('show') === 'filter' ? [
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
            'personil' => request('personil'),
        ] : [];
        $personil = $this->personil->get();
        return $dataTable->render('jurnal.index', compact('by', 'filter', 'personil'));
    }
}

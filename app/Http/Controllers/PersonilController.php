<?php

namespace App\Http\Controllers;

use App\DataTables\PersonilDataTable;
use App\Models\Personil;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PdfReport;
use ExcelReport;

class PersonilController extends Controller
{
    public function __construct(
        private readonly Personil $personil
    ) {

    }
    public function index(PersonilDataTable $dataTable)
    {
        // $search = $request->search;
        // $personils = $this->personil->where('NAMALENGKAP', 'LIKE', '%' . $search . '%')->whereNot('NOMOR', 0)->paginate();
        // return view('personil.index', compact('personils', 'search'));
        return $dataTable->render('personil.index');
    }

    public function create()
    {
        return view('personil.create');
    }
    public function import()
    {
        return view('personil.import');
    }

}

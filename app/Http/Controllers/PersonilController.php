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

    public function downloadFormat()
    {
        return response()->download(storage_path('/app/public/personil-template.xlsx'));
    }
    public function reset()
    {
        return view('personil.reset');
    }
    public function edit(string $id)
    {
        $personil = $this->personil->findOrFail($id);
        return view('personil.edit', compact('personil'));
    }
}

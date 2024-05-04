<?php

namespace App\Http\Controllers;

use App\DataTables\SiswaDataTable;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(SiswaDataTable $dataTable)
    {
        return $dataTable->render('siswa.index');
    }
    public function import()
    {
        return view('siswa.import');
    }
    public function reset()
    {
        return view('siswa.reset');
    }
    public function downloadFormat()
    {
        return response()->download(storage_path('/app/public/siswa-template.xlsx'));
    }
}

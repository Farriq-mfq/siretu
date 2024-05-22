<?php

namespace App\Http\Controllers;

use App\DataTables\KelasDataTable;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(KelasDataTable $datatable)
    {
        return $datatable->render('kelas.index');
    }
    public function reset()
    {
        return view('kelas.reset');
    }

    public function downloadFormat()
    {
        return response()->download(storage_path('/app/public/kelas-template.xlsx'));
    }

    public function import()
    {
        return view('kelas.import');
    }

    public function create()
    {
        return view('kelas.create');
    }
    public function edit()
    {
        return 'edit';
        // $kelas = $
        // return view('kelas.edit');
    }
}
